<?php


class Langue {

    private $nomLangue;
    private $niveauLangue;

    public function __construct($n="", $nl="") {
	    $this->nomComp = $n;
        $this->niveauLangue = $nl;
    }

    public function getNomLangue() { return $this->nomLangue; }
    public function getNiveauLangue() { return $this->niveauLangue; }

    public function __toString() {
	    $res = "nomLangue:".$this->nomLangue."\n";
        $res = $res ."niveauLangue:".$this->niveauLangue."\n";
        $res = $res ."<br/>";
	    return $res;
    }
}

//test
//$uneLangue = new Langue('Anglais', 'Intermédiaire (B2)');
//echo $uneLangue;
?>