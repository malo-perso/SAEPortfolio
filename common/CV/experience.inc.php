<?php


class Experience {

    private static $compteur = 0;

    private $idExperience;
    private $intitulePoste;
    private $nomEmployeur;
    private $villeEmployeur;
    private $typeContrat;
    private $dateDebut;
    private $dateFin;


    public function __construct($ip="",$ne="",$ve="",$tc="",$dd="",$df="") 
    {
        $this->idExperience = ++self::$compteur;    	
        $this->intitulePoste = $ip;
        $this->nomEmployeur = $ne;
        $this->villeEmployeur = $ve;
        $this->typeContrat = $tc;
        $this->dateDebut = $dd;
        $this->dateFin = $df;
    }

    public function getIdExperience  () { return $this->idExperience; }
    public function getIntitulePoste () { return $this->intitulePoste; }
    public function getNomEmployeur  () { return $this->nomEmployeur; }
    public function getVilleEmployeur() { return $this->villeEmployeur; }
    public function getTypeContrat   () { return $this->typeContrat; }
    public function getDateDebut     () { return $this->dateDebut; }
    public function getDateFin       () { return $this->dateFin; }
    

    public function __toString() {
      	$res = "idExperience:".$this->idExperience."\n";
        $res = $res ."intitulePoste:".$this->intitulePoste."\n";
        $res = $res ."nomEmployeur:".$this->nomEmployeur."\n";
        $res = $res ."villeEmployeur:".$this->villeEmployeur."\n";
        $res = $res ."typeContrat:".$this->typeContrat."\n";
        $res = $res ."dateDebut:".$this->dateDebut."\n";
        $res = $res ."dateFin:".$this->dateFin."\n";
        $res = $res ."<br/>";
	    return $res;
    }
}

//test
//$uneExperience = new Experience(1, 'Développeur', 'Sopra Steria', 'Paris', 'CDI', '01/01/2015', '01/01/2016');
//echo $uneExperience;
?>