<?php

/*classe permettant de representer les tuples de la table experience */
class Experience {
    /*avec PDO, il faut que les noms attributs soient les mêmes que ceux de la table*/
    private $idexperience;
    private $intituleposte;
    private $nomemployeur;
    private $villeemployeur;
    private $descexperience;
    private $datedebut;
    private $datefin;
    

    /* Les méthodes qui commencent par __ sont des methodes magiques
    Elles sont appelées automatiquement par php suite à certains événements.
    Ici c'est l'appel à new sur la classe qui déclenche l'exécution de la méthode
    des valeurs par défaut doivent être spécifiées pour les paramètres du constructeur sinon
    il y aura une erreur lorsqu'il sera appelé automatiquement par PDO */    
      
    public function __construct($i=-1,$ip="",$ne="",$ve="",$de="",$dd="",$df="") {
      	$this->idexperience = $i;
        $this->intituleposte = $ip;
        $this->nomemployeur = $ne;
        $this->villeemployeur = $ve;
        $this->datedebut = $dd;
        $this->datefin = $df;
        $this->descexperience = $de;
    }

    public function getIdexperience() { return $this->idexperience; }
    public function getIntituleposte() { return $this->intituleposte; }
    public function getNomemployeur() { return $this->nomemployeur; }
    public function getVilleemployeur() { return $this->villeemployeur; }
    public function getDescexperience() { return $this->descexperience; }
    public function getDatedebut() { return $this->datedebut; }
    public function getDatefin() { return $this->datefin; }
    

    public function __toString() {
      	$res = "idcli:".$this->idexperience."\n";
        $res = $res ."intituleposte:".$this->intituleposte."\n";
        $res = $res ."nomemployeur:".$this->nomemployeur."\n";
        $res = $res ."villeemployeur:".$this->villeemployeur."\n";
        $res = $res ."descexperience:".$this->descexperience."\n";
        $res = $res ."datedebut:".$this->datedebut."\n";
        $res = $res ."datefin:".$this->datefin."\n";
        $res = $res ."<br/>";
	    return $res;
    }
}

//test
//$uneexperience = new Experience(1, 'Développeur', 'Sopra Steria', 'Paris', 'Développement d\'une application web', '2017-01-01', '2017-12-31');
//echo $uneexperience;
?>