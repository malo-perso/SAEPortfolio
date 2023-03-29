<?php

/*classe permettant de representer les tuples de la table projet */
class Projet {
    /*avec PDO, il faut que les noms attributs soient les mêmes que ceux de la table*/
    private $idprojet;
    private $nomprojet;
    private $descprojet;

    /* Les méthodes qui commencent par __ sont des methodes magiques
    Elles sont appelées automatiquement par php suite à certains événements.
    Ici c'est l'appel à new sur la classe qui déclenche l'exécution de la méthode
    des valeurs par défaut doivent être spécifiées pour les paramètres du constructeur sinon
    il y aura une erreur lorsqu'il sera appelé automatiquement par PDO */    
      
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