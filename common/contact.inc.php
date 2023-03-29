<?php

/*classe permettant de representer les tuples de la table contact */
class Contact {
    /*avec PDO, il faut que les noms attributs soient les mêmes que ceux de la table*/
    private $idcontact;
    private $nomcontact;
    private $desccontact;

    /* Les méthodes qui commencent par __ sont des methodes magiques
    Elles sont appelées automatiquement par php suite à certains événements.
    Ici c'est l'appel à new sur la classe qui déclenche l'exécution de la méthode
    des valeurs par défaut doivent être spécifiées pour les paramètres du constructeur sinon
    il y aura une erreur lorsqu'il sera appelé automatiquement par PDO */    
      
    public function __construct($i=-1,$n="",$d="") {
      	$this->idcontact = $i;
	    $this->nomcontact = $n;
	    $this->desccontact = $d;
    }

    public function getIdcontact() { return $this->idcontact; }
    public function getNomcontact() { return $this->nomcontact; }
    public function getDesccontact() { return $this->desccontact; }

    public function __toString() {
      	$res = "idcli:".$this->idcontact."\n";
        $res = $res ."nomcontact:".$this->nomcontact."\n";
        $res = $res ."desccontact:".$this->desccontact."\n";
        $res = $res ."<br/>";
	    return $res;
    }
}

//test
//$uncontact = new Contact(1, 'messagerie', 'jolibonhomme31@gmail.com');o
//echo $uncontact;
?>