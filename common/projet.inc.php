<?php

class Projet implements \JsonSerializable 
{
    private static $compteur = 0;
    private $idProjet;
    private $nomProjet;
    private $descProjet;
      
    public function __construct($n="",$d="") {
      	$this->idProjet = ++self::$compteur;
        $this->nomProjet = $n;
        $this->descProjet = $d;
    }

    public function getIdProjet  () { return $this->idProjet; }
    public function getNomProjet () { return $this->nomProjet; }
    public function getDescProjet() { return $this->descProjet; }

    public function __toString() {
      	$res = "idProjet:".$this->idProjet."\n";
        $res = $res ."nomProjet:".$this->nomProjet."\n";
        $res = $res ."descProjet:".$this->descProjet."\n";
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
//$unprojet = new Projet(1, 'PAC', 'Projet de fin de formation');
//echo $unprojet;
?>