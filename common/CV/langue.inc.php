<?php


class Langue {

    private $idLangue;
    private $nomLangue;
    private $niveauLangue;

    public function __construct($i=-1, $n="", $nl="") {
        $this->idLangue = $i;
        $this->nomLangue = $n;
        $this->niveauLangue = $nl;
    }

    public function getIdLangue() { return $this->idLangue; }
    public function getNomLangue() { return $this->nomLangue; }
    public function getNiveauLangue() { return $this->niveauLangue; }

    public function __toString() {
        $res = "idLangue:".$this->idLangue."\n";
	    $res = $res ."nomLangue:".$this->nomLangue."\n";
        $res = $res ."niveauLangue:".$this->niveauLangue."\n";
        $res = $res ."<br/>";
	    return $res;
    }
}

//test
//$uneLangue = new Langue('Anglais', 'Intermédiaire (B2)');
//echo $uneLangue;
?>