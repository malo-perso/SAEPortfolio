<?php


class Formation {

    private $idformation;
    private $nometablissement;
    private $villeetablissement;
    private $diplome;
    private $domaine;
    private $datedebut;
    private $datefin;
   

    public function __construct($i=-1,$n="",$v="", $di="", $do="", $dd="", $df="") {
      	$this->idformation = $i;
        $this->nometablissement = $n;
        $this->villeetablissement = $v;
        $this->diplome = $di;
        $this->domaine = $do;
        $this->datedebut = $dd;
        $this->datefin = $df;
    }

    public function getIdformation        () { return $this->idformation; }
    public function getNometablissement   () { return $this->nometablissement; }
    public function getVilleetablissement () { return $this->villeetablissement; }
    public function getDiplome            () { return $this->diplome; }
    public function getDomaine            () { return $this->domaine; }
    public function getDatedebut          () { return $this->datedebut; }
    public function getDatefin            () { return $this->datefin; }

    public function __toString() {
      	$res = "idcli:".$this->idformation."\n";
        $res = $res ."nometablissement:".$this->nometablissement."\n";
        $res = $res ."villeetablissement:".$this->villeetablissement."\n";
        $res = $res ."diplome:".$this->diplome."\n";
        $res = $res ."domaine:".$this->domaine."\n";
        $res = $res ."datedebut:".$this->datedebut."\n";
        $res = $res ."datefin:".$this->datefin."\n";
        $res = $res ."<br/>";
	    return $res;
    }
}

//test
//$uneformation = new Formation(1, "Ecole de la Paix", "Paris", "Licence", "Droit", "2010-09-01", "2013-06-01);
//echo $uneformation;
?>