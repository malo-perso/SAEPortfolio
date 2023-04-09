<?php


class Formation implements JsonSerializable{

    private static $numFormation = 0;
    private $idFormation;
    private $nomEtablissement;
    private $villeEtablissement;
    private $diplome;
    private $domaine;
    private $dateDebut;
    private $dateFin;


    public function __construct($n="",$v="", $di="", $do="", $dd="", $df="") 
    {
        $this->idFormation = ++self::$numFormation;
        $this->nomEtablissement = $n;
        $this->villeEtablissement = $v;
        $this->diplome = $di;
        $this->domaine = $do;
        $this->dateDebut = $dd;
        $this->dateFin = $df;
    }

    public function getIdFormation        () { return $this->idFormation; }
    public function getNomEtablissement   () { return $this->nomEtablissement; }
    public function getVilleEtablissement () { return $this->villeEtablissement; }
    public function getDiplome            () { return $this->diplome; }
    public function getDomaine            () { return $this->domaine; }
    public function getDateDebut          () { return $this->dateDebut; }
    public function getDateFin            () { return $this->dateFin; }

    public function __toString() {
        $res = "idFormation:".$this->idFormation."\n";
        $res = $res ."noEtablissement:".$this->nomEtablissement."\n";
        $res = $res ."villeEtablissement:".$this->villeEtablissement."\n";
        $res = $res ."diplome:".$this->diplome."\n";
        $res = $res ."domaine:".$this->domaine."\n";
        $res = $res ."dateDebut:".$this->dateDebut."\n";
        $res = $res ."dateFin:".$this->dateFin."\n";
        $res = $res ."<br/>";
	    return $res;
    }

    public function jsonSerialize() : array
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}

//test
//$uneFormation = new Formation(1, "Ecole de la Paix", "Paris", "Licence", "Droit", "2010-09-01", "2013-06-01);
//echo $uneFormation;
?>