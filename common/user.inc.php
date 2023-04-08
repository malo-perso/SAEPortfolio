<?php

/*classe permettant de representer les tuples de la table User */
class User {
    /*avec PDO, il faut que les noms attributs soient les mêmes que ceux de la table*/
    private $iduser;
    private $nom;
    private $prenom;
    private $mail;
    private $mdp;  

    public function __construct($iduser=-1,$nom="",$prenom="",$mail="",$mdp="") {
        $this->iduser = $iduser;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->mdp = $mdp;
    }

    public function getIdUser() { return $this->iduser; }
    public function getNom() { return $this->nom; }
    public function getPrenom() { return $this->prenom;}
    public function getMail() { return $this->mail; }
    public function getMdp() { return $this->mdp; }

    public function __toString() {
        $res = "iduser:".$this->iduser."\n";
        $res = "nom:".$this->nom."\n";
        $res = $res ."prenom:".$this->prenom."\n";
        $res = $res ."mail:".$this->mail."\n";
        $res = $res ."mdp:".$this->mdp."\n";
        return $res;
    }
}

//test
//$unUser = new User("nom1","prenom1","mail1","mdp1");
//echo $unUser;
?>