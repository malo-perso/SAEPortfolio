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
    private $competences = array();
    private $experiences = array();
    private $formations = array();
    private $langues = array();
    

    // Constructeur
    public function __construct($coordonnees,$competences, $experiences, $formations, $langues )
    {
        $this->coordonnees = $coordonnees;
        $this->competences = $competences;
        $this->experiences = $experiences;
        $this->formations  = $formations;
        $this->langues     = $langues;
    }

    // Accesseurs
    public function getCoordonnees() { return $this->coordonnees; }
    public function getCompetences() { return $this->competences; }
    public function getExperiences() { return $this->experiences; }
    public function getFormations() { return $this->formations; }
    public function getLangues() { return $this->langues; }
   

    // Méthodes
    public function __toString()
    {
        $res = "Coordonnées : ".$this->coordonnees."\n";
        $res = $res ."<br/>";
        for ($i=0; $i < count($this->competences); $i++) { 
            $res = $res . "Compétence : ".$this->competences[$i]."\n";
            $res = $res ."<br/>";
        }
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
    }

    public function ajouterExperience($experience)
    {
        array_push($this->experiences, $experience);
    }

    public function ajouterCompetence($competence)
    {
        array_push($this->competences, $competence);
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

    public function supprimerCompetence($idCompetence) {
        for ($i=0; $i < count($this->competences); $i++) { 
            if ($this->competences[$i]->getIdCompetence() == $idCompetence) {
                unset($this->competences[$i]);
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

    public function modifierCoordonnees($coordonnees) {
        $this->coordonnees = $coordonnees;
    }


    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}

