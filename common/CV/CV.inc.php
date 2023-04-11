<?php

require ('competence.inc.php');
require ('coordonnees.inc.php');
require ('experience.inc.php');
require ('formation.inc.php');
require ('langue.inc.php');

class CV implements \JsonSerializable
{
    // Attributs (tableau de compétences, tableau d'expériences, tableau de tabFormations, tableau de tabLangues, coordonnées)
    private $coordonnees;
    private $competences;
    private $tabExperiences = array();
    private $tabFormations = array();
    private $tabLangues = array();
    private $couleur;
    private $template;
    

    // Constructeur
    public function __construct($coordonnees = null , $competences = null, $tabExperiences = array(), $tabFormations = array(), $tabLangues = array())
    {
    // Vérifiez si la variable $coordonnees est null avant de l'utiliser
    if ($coordonnees === null) {
        $coordonnees = new Coordonnees();
    }
        $this->coordonnees = $coordonnees;
        $this->competences = $competences;
        $this->tabExperiences = $tabExperiences;
        $this->tabFormations  = $tabFormations;
        $this->tabLangues     = $tabLangues;
        $this->couleur = "#9DBB59";
        $this->template = "CV2.tpl";
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

    public function getTabExperiences() { return $this->tabExperiences; }
    public function getTabFormations() { return $this->tabFormations; }
    public function getTabLangues() { return $this->tabLangues; }
    public function getCouleur() { return $this->couleur; }
    public function getTemplate() { return $this->template; }
   
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
        for ($i=0; $i < count($this->tabExperiences); $i++) { 
            $res = $res . "Expérience : ".$this->tabExperiences[$i]."\n";
            $res = $res ."<br/>";
        }
        for ($i=0; $i < count($this->tabFormations); $i++) { 
            $res = $res . "Formation : ".$this->tabFormations[$i]."\n";
            $res = $res ."<br/>";
        }
        for ($i=0; $i < count($this->tabLangues); $i++) { 
            $res = $res . "Langue : ".$this->tabLangues[$i]."\n";
            $res = $res ."<br/>";
        }
        return $res;
        
    }

    public function ajouterFormation($formation)
    {
        array_push($this->tabFormations, $formation);
    }

    public function ajouterExperience($experience)
    {
        array_push($this->tabExperiences, $experience);
    }


    public function majCompetence($competence)
    {
        $this->competences = $competence;
    }

    public function ajouterLangue($langue)
    {
        array_push($this->tabLangues, $langue);
    }


    public function supprimerFormation($idFormation) {
        for ($i=0; $i < count($this->tabFormations); $i++) { 
            if ($this->tabFormations[$i]->getIdFormation() == $idFormation) {
                unset($this->tabFormations[$i]);
            }
        }
    }

    public function supprimerExperience($idExperience) {
        for ($i=0; $i < count($this->tabExperiences); $i++) { 
            if ($this->tabExperiences[$i]->getIdExperience() == $idExperience) {
                unset($this->tabExperiences[$i]);
            }
        }
    }

    public function supprimerLangue($idLangue) {
        for ($i=0; $i < count($this->tabLangues); $i++) { 
            if ($this->tabLangues[$i]->getIdLangue() == $idLangue) {
                unset($this->tabLangues[$i]);
            }
        }
    }

    public function modifierCoordonnees($coordonnees) 
    {
        $this->coordonnees = $coordonnees;
        echo "Coordonnées modifiées";
    }

    public function modifierCouleur($couleur) 
    {
        $this->couleur = $couleur;
    }

    public function modifierTemplate($template) 
    {
        $this->template = $template;
    }


    public function jsonSerialize() : array
    {
        $vars = get_object_vars($this);
        return $vars;
    }

    public function tabToCV($tab) 
    {
        if ($tab == null) {
            $this->coordonnees = new Coordonnees();
            $this->competences = new Competences();
            $this->tabExperiences = array();
            $this->tabFormations  = array();
            $this->tabLangues     = array();

            echo "CV null";
        }
        else 
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
            $contenu_Formation = $tab['tabFormations'];
            $tabFormation = array();
            for ($i=0; $i < count($contenu_Formation); $i++) 
            { 
                $formation = new Formation($contenu_Formation[$i]['nomEtablissement'],
                                        $contenu_Formation[$i]['villeEtablissement'],
                                        $contenu_Formation[$i]['diplome'],
                                        $contenu_Formation[$i]['domaine'],
                                        $contenu_Formation[$i]['mention'],
                                            $contenu_Formation[$i]['dateDebutMois'],
                                            $contenu_Formation[$i]['dateDebutAnnee'],
                                            $contenu_Formation[$i]['dateFinMois'],
                                            $contenu_Formation[$i]['dateFinAnnee']);

                $formation->setIdFormation($contenu_Formation[$i]['idFormation']);

                array_push($tabFormation, $formation);
            }

            //Experience
            $contenu_Experience = $tab['tabExperiences'];
            $tabExperience = array();
            for ($i=0; $i < count($contenu_Experience); $i++) 
            { 
                $experience = new Experience($contenu_Experience[$i]['intitulePoste'],
                                            $contenu_Experience[$i]['nomEmployeur'],
                                            $contenu_Experience[$i]['villeEmployeur'],
                                            $contenu_Experience[$i]['typeContrat'],
                                            $contenu_Experience[$i]['dateDebutMois'],
                                            $contenu_Experience[$i]['dateDebutAnnee'],
                                            $contenu_Experience[$i]['dateFinMois'],
                                            $contenu_Experience[$i]['dateFinAnnee'],
                                            $contenu_Experience[$i]['mission']);
                array_push($tabExperience, $experience);
            }

            //Competences
            $contenu_Competence = $tab['competences'];
            var_dump($contenu_Competence);
            $competence = new Competences($contenu_Competence['softSkills'],
                                        $contenu_Competence['hardSkills']);

                    
            //Langues
            $contenu_Langue = $tab['tabLangues'];
            $tabLangue = array();
            for ($i=0; $i < count($contenu_Langue); $i++) 
            { 
                $langue = new Langue($contenu_Langue[$i]['nomLangue'],
                                    $contenu_Langue[$i]['niveauLangue']);

                $langue->setIdLangue($contenu_Langue[$i]['idLangue']);

                array_push($tabLangue, $langue);
            }

            $this->coordonnees = $coordonnees;
            $this->tabFormations = $tabFormation;
            $this->tabExperiences = $tabExperience;
            $this->competences = $competence;
            $this->tabLangues = $tabLangue;
        }
    }
}

