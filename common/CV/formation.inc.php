<?php


class Formation implements JsonSerializable{

    private static $numFormation = 0;
    private $idFormation;
    private $nomEtablissement;
    private $villeEtablissement;
    private $diplome;
    private $domaine;
    private $mention;
    private $dateDebutMois;
    private $dateDebutAnnee;
    private $dateFinMois;
    private $dateFinAnnee;


    public function __construct($n="",$v="", $di="", $do="", $m="", $dbm="", $dba="", $dfm="", $dfa="") 
    {
        $this->idFormation = ++self::$numFormation;
        $this->nomEtablissement = $n;
        $this->villeEtablissement = $v;
        $this->diplome = $di;
        $this->domaine = $do;
        $this->mention = $m;
        $this->dateDebutMois = $dbm;
        $this->dateDebutAnnee = $dba;
        $this->dateFinMois = $dfm;
        $this->dateFinAnnee = $dfa;
    }

    public function getIdFormation        () { return $this->idFormation; }
    public function getNomEtablissement   () { return $this->nomEtablissement; }
    public function getVilleEtablissement () { return $this->villeEtablissement; }
    public function getDiplome            () { return $this->diplome; }
    public function getDomaine            () { return $this->domaine; }
    public function getMention            () { return $this->mention; }
    public function getDateDebutMois      () { return $this->dateDebutMois; }
    public function getDateDebutAnnee     () { return $this->dateDebutAnnee; }
    public function getDateFinMois        () { return $this->dateFinMois; }
    public function getDateFinAnnee       () { return $this->dateFinAnnee; }

    public function __toString() {
        $res = "idFormation:".$this->idFormation."\n";
        $res = $res ."noEtablissement:".$this->nomEtablissement."\n";
        $res = $res ."villeEtablissement:".$this->villeEtablissement."\n";
        $res = $res ."diplome:".$this->diplome."\n";
        $res = $res ."domaine:".$this->domaine."\n";
        $res = $res ."mention:".$this->mention."\n";
        $res = $res ."dateDebutMois:".$this->dateDebutMois."\n";
        $res = $res ."dateDebutAnnee:".$this->dateDebutAnnee."\n";
        $res = $res ."dateFinMois:".$this->dateFinMois."\n";
        $res = $res ."dateFinAnnee:".$this->dateFinAnnee."\n";
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