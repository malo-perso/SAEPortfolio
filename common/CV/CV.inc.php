<?php

require ('./competence.inc.php');
require ('./coordonnees.inc.php');
require ('./experience.inc.php');
require ('./formation.inc.php');
require ('./langue.inc.php');

class CV 
{
    // Attributs (tableau de compétences, tableau d'expériences, tableau de formations, tableau de langues, coordonnées)
    private $coordonnees;
    private $competences;
    private $experiences;
    private $formations;
    private $langues;
    

    // Constructeur
    public function __construct($coordonnees,$competences, $experiences, $formations, $langues )
    {
        $this->coordonnees = $coordonnees;
        $this->competences = $competences;
        $this->experiences = $experiences;
        $this->formations = $formations;
        $this->langues = $langues;
        
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
}

