<?php


class Competence {

    private $idcomp;
    private $desccomp;

      
    public function __construct($i=-1,$d="") {
      	$this->ncomp = $i;
	    $this->desccomp = $d;
    }

    public function getIdcomp() { return $this->idcomp; }
    public function getdesccomp() { return $this->desccomp; }

    public function __toString() {
      	$res = "idcomp:".$this->idcomp."\n";
	    $res = $res ."desccomp:".$this->desccomp."\n";
        $res = $res ."<br/>";
	    return $res;
    }
}

//test
//$unecomp = new Competence(5,'Planter les choux');
//echo $unecomp;
?>