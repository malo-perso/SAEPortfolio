<?php


class Competence {

    private $idComp;
    private $descComp;

      
    public function __construct($i=-1,$d="") {
      	$this->idComp = $i;
	    $this->descComp = $d;
    }

    public function getIdComp  () { return $this->idComp; }
    public function getDescComp() { return $this->descComp; }

    public function __toString() {
      	$res = "idComp:".$this->idComp."\n";
	    $res = $res ."descComp:".$this->descComp."\n";
        $res = $res ."<br/>";
	    return $res;
    }
}

//test
//$uneComp = new Competence(5,'Planter les choux');
//echo $uneComp;
?>