<?php

require ('competence.inc.php');
require ('coordonnees.inc.php');
require ('experience.inc.php');
require ('formation.inc.php');
require ('langue.inc.php');

class CV implements \JsonSerializable
{
    // Attributs (tableau de compétences, tableau d'expériences, tableau de formations, tableau de langues, coordonnées)
    private $coordonnees;
    private $competences;
    private $experiences = array();
    private $formations = array();
    private $langues = array();
    

    // Constructeur
    public function __construct($coordonnees = null , $competences = null, $experiences = array(), $formations = array(), $langues = array())
    {
    // Vérifiez si la variable $coordonnees est null avant de l'utiliser
    if ($coordonnees === null) {
        $coordonnees = new Coordonnees();
    }
        $this->coordonnees = $coordonnees;
        $this->competences = $competences;
        $this->experiences = $experiences;
        $this->formations  = $formations;
        $this->langues     = $langues;
    }


    // Accesseurs
    public function getCoordonnees() {
        if ($this->coordonnees == null) {
            echo "Coordonnées null";
            $this->coordonnees = new Coordonnees();
        }
        return $this->coordonnees; 
    }

    public function getCompetences() {
        if ($this->competences == null) {
            echo "Compétences null";
            $this->competences = new Competences();
        }
        return $this->competences; 
    }

    public function getExperiences() { return $this->experiences; }
    public function getFormations() { return $this->formations; }
    public function getLangues() { return $this->langues; }
   
    public function __get($property)
    {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    // Méthodes
    public function __toString()
    {
        $res = "Coordonnées : ".$this->coordonnees."\n";
        $res = $res ."<br/>";
        $res = $res . "Compétences : ".$this->competences."\n";
        for ($i=0; $i < count($this->experiences); $i++) { 
            $res = $res . "Expérience : ".$this->experiences[$i]."\n";
            $res = $res ."<br/>";
        }
        for ($i=0; $i < count($this->formations); $i++) { 
            $res = $res . "Formation : ".$this->formations[$i]."\n";
            $res = $res ."<br/>";
        }
        for ($i=0; $i < count($this->langues); $i++) { 
            $res = $res . "Langue : ".$this->langues[$i]."\n";
            $res = $res ."<br/>";
        }
        return $res;
        
    }

    public function ajouterFormation($formation)
    {
        array_push($this->formations, $formation);
        return true;
    }

    public function ajouterExperience($experience)
    {
        array_push($this->experiences, $experience);
    }

    public function majCompetence($competence)
    {
        $this->competences = $competence;
    }

    public function ajouterLangue($langue)
    {
        array_push($this->langues, $langue);
    }


    public function supprimerFormation($idFormation) {
        for ($i=0; $i < count($this->formations); $i++) { 
            if ($this->formations[$i]->getIdFormation() == $idFormation) {
                unset($this->formations[$i]);
            }
        }
    }

    public function supprimerExperience($idExperience) {
        for ($i=0; $i < count($this->experiences); $i++) { 
            if ($this->experiences[$i]->getIdExperience() == $idExperience) {
                unset($this->experiences[$i]);
            }
        }
    }

    public function supprimerLangue($idLangue) {
        for ($i=0; $i < count($this->langues); $i++) { 
            if ($this->langues[$i]->getIdLangue() == $idLangue) {
                unset($this->langues[$i]);
            }
        }
    }

    public function modifierCoordonnees($coordonnees) 
    {
        $this->coordonnees = $coordonnees;
        echo "Coordonnées modifiées";
    }


    public function jsonSerialize() : array
    {
        $vars = get_object_vars($this);
        return $vars;
    }

    public function tabToCV($tab) 
    {
        //Coordonnées
        $contenu_Coord = $tab['coordonnees'];

        $coordonnees = new Coordonnees($contenu_Coord['image'],
                                       $contenu_Coord['prenom'], 
                                       $contenu_Coord['nom'], 
                                       $contenu_Coord['nomPoste'], 
                                       $contenu_Coord['adresse'], 
                                        $contenu_Coord['codePostal'],
                                        $contenu_Coord['ville'],
                                        $contenu_Coord['telephone'],
                                        $contenu_Coord['email'],
                                        $contenu_Coord['phraseAccroche']);
        
        //Formation
        $contenu_Formation = $tab['formations'];
        $tabFormation = array();
        for ($i=0; $i < count($contenu_Formation); $i++) 
        { 
            $formation = new Formation($contenu_Formation[$i]['intituleFormation'],
                                       $contenu_Formation[$i]['dateDebut'],
                                       $contenu_Formation[$i]['dateFin'],
                                       $contenu_Formation[$i]['lieu'],
                                       $contenu_Formation[$i]['description']);

            $formation->setIdFormation($contenu_Formation[$i]['idFormation']);

            array_push($tabFormation, $formation);
        }

        //Experience
        $contenu_Experience = $tab['experiences'];
        $tabExperience = array();
        for ($i=0; $i < count($contenu_Experience); $i++) 
        { 
            $experience = new Experience($contenu_Experience[$i]['idExperience'],
                                         $contenu_Experience[$i]['intituleExperience'],
                                         $contenu_Experience[$i]['dateDebut'],
                                         $contenu_Experience[$i]['dateFin'],
                                         $contenu_Experience[$i]['lieu'],
                                         $contenu_Experience[$i]['description']);

            array_push($tabExperience, $experience);
        }

        //Competences
        $contenu_Competence = $tab['competences'];
        $competences = new Competences($contenu_Competence['softSkills'],
                                       $contenu_Competence['hardSkills']);

                
        //Langues
        $contenu_Langue = $tab['langues'];
        $tabLangue = array();
        for ($i=0; $i < count($contenu_Langue); $i++) 
        { 
            $langue = new Langue($contenu_Langue[$i]['intituleLangue'],
                                 $contenu_Langue[$i]['niveauLangue']);

            $langue->setIdLangue($contenu_Langue[$i]['idLangue']);

            array_push($tabLangue, $langue);
        }

        $this->coordonnees = $coordonnees;
        $this->formations = $tabFormation;
        $this->experiences = $tabExperience;
        $this->competences = $competences;
        $this->langues = $tabLangue;
    }
}

