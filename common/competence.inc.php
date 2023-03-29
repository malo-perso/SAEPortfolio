<?php

/*classe permettant de representer les tuples de la table competence */
class Competence {
    /*avec PDO, il faut que les noms attributs soient les mêmes que ceux de la table*/
    private $idcomp;
    private $desccomp;

    /* Les méthodes qui commencent par __ sont des methodes magiques
    Elles sont appelées automatiquement par php suite à certains événements.
    Ici c'est l'appel à new sur la classe qui déclenche l'exécution de la méthode
    des valeurs par défaut doivent être spécifiées pour les paramètres du constructeur sinon
    il y aura une erreur lorsqu'il sera appelé automatiquement par PDO */    
      
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