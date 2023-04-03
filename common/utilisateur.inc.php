<?php

class Utilisateur {

    private $idUtil;
    private $nom;
    private $prenom;
    private $mail;
    private $mdp;  
      
    public function __construct($i=-1,$n="",$p="",$ma="",$md="") {
        $this->idUtil = $i;
        $this->nom = $n;
        $this->prenom = $p;
        $this->mail = $ma;
        $this->mdp = $md;
    }

    public function getIdUtil() { return $this->idUtil; }
    public function getNom() { return $this->nom; }
    public function getPrenom() { return $this->prenom;}
    public function getMail() { return $this->mail; }
    public function getMdp() { return $this->mdp; }

    public function __toString() {
        $res = "idUtil:".$this->idUtil."\n";
        $res = $res ."nom:".$this->nom."\n";
        $res = $res ."prenom:".$this->prenom."\n";
        $res = $res ."mail:".$this->mail."\n";
        $res = $res ."mdp:".$this->mdp."\n";
        return $res;
    }
}

//test
//$unUtilisateur = new Utilisateur("nom1","prenom1","mail1","mdp1");
//echo $unUtilisateur;
?>