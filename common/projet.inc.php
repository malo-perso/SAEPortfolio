<?php


class Projet {

    private $idprojet;
    private $nomprojet;
    private $descprojet;
  
      
    public function __construct($i=-1,$n="",$d="") {
      	$this->id = $i;
        $this->nomprojet = $n;
        $this->descprojet = $d;
    }

    public function getIdprojet()   { return $this->idprojet; }
    public function getNomprojet()  { return $this->nomprojet; }
    public function getDescprojet() { return $this->descprojet; }

    public function __toString() {
      	$res = "idcli:".$this->idprojet."\n";
        $res = $res ."nomprojet:".$this->nomprojet."\n";
        $res = $res ."descprojet:".$this->descprojet."\n";
        $res = $res ."<br/>";
	    return $res;
    }
}

//test
//$uneformation = new Formation(1, "Ecole de la Paix", "Paris", "Licence", "Droit", "2010", "2013");
//echo $uneformation;
?>