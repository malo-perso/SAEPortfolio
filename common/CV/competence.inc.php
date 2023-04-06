<?php


class Competence implements \JsonSerializable {

    private $nomComp;

    public function __construct($n="") {
	    $this->nomComp = $n;
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