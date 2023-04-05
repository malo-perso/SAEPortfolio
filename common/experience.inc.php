<?php


class Experience implements \JsonSerializable{

    private $idExperience;
    private $intitulePoste;
    private $nomEmployeur;
    private $villeEmployeur;
    private $descExperience;
    private $dateDebut;
    private $dateFin;
    
      
    public function __construct($i=-1,$ip="",$ne="",$ve="",$de="",$dd="",$df="") {
      	$this->idExperience = $i;
        $this->intitulePoste = $ip;
        $this->nomEmployeur = $ne;
        $this->villeEmployeur = $ve;
        $this->dateDebut = $dd;
        $this->dateFin = $df;
        $this->descExperience = $de;
    }

    public function getIdExperience  () { return $this->idExperience; }
    public function getIntitulePoste () { return $this->intitulePoste; }
    public function getNomEmployeur  () { return $this->nomEmployeur; }
    public function getVilleEmployeur() { return $this->villeEmployeur; }
    public function getDescExperience() { return $this->descExperience; }
    public function getDateDebut     () { return $this->dateDebut; }
    public function getDateFin       () { return $this->dateFin; }
    

    public function __toString() {
      	$res = "idExperience:".$this->idExperience."\n";
        $res = $res ."intitulePoste:".$this->intitulePoste."\n";
        $res = $res ."nomEmployeur:".$this->nomEmployeur."\n";
        $res = $res ."villeEmployeur:".$this->villeEmployeur."\n";
        $res = $res ."descExperience:".$this->descExperience."\n";
        $res = $res ."dateDebut:".$this->dateDebut."\n";
        $res = $res ."dateFin:".$this->dateFin."\n";
        $res = $res ."<br/>";
	    return $res;
    }
    
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}

//test
//$uneExperience = new Experience(1, 'Développeur', 'Sopra Steria', 'Paris', 'Développement d\'une application web', '2017-01-01', '2017-12-31');
//echo $uneExperience;
?>