<?php


class Langue implements JsonSerializable{

    private static $numLangue = 0;

    private $idLangue;
    private $nomLangue;
    private $niveauLangue;

    public function __construct($n="", $nl="") 
    {
        $this->idLangue = ++self::$numLangue;
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

    public function jsonSerialize() : array
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}

//test
//$uneLangue = new Langue('Anglais', 'Intermédiaire (B2)');
//echo $uneLangue;
?>