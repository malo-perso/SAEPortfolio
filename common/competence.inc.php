<?php


class Competence implements \JsonSerializable {

    private $nomComp;

<<<<<<< Updated upstream
    public function __construct($n="") {
	    $this->nomComp = $n;
=======
    public function __construct($i=-1,$d="") {
      	$this->idComp = $i;
	    $this->descComp = $d;
>>>>>>> Stashed changes
    }

    public function getNomComp() { return $this->nomComp; }

    public function __toString() {
	    $res = "nomComp:".$this->nomComp."\n";
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
//$uneComp = new Competence('Planter les choux');
//echo $uneComp;
?>