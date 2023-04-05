<?php

/*classe permettant de representer les tuples de la table User */
class Page implements \JsonSerializable{
      /*avec PDO, il faut que les noms attributs soient les mêmes que ceux de la table*/
    private $idPage;
    private $nomPage;
    private $contenu;
    private $idPortfolio;  
      
    public function __construct($idPage="",$n="",$c="",$idPortfolio="") {
        $this->idPage = $idPage;
        $this->nomPage = $n;
        $this->contenu = $c;
        $this->idPortfolio = $idPortfolio;
    }

    public function getIdPage() { return $this->idPage; }
    public function getNomPage() { return $this->nomPage;}
    public function getContenu() { return $this->contenu; }
    public function getIdPortfolio() { return $this->idPortfolio; }

    public function __toString() {
        $res = "idPage:".$this->idPage."\n";
        $res = $res ."nomPage:".$this->nomPage."\n";
        $res = $res ."contenu:".$this->contenu."\n";
        $res = $res ."idPortfolio:".$this->idPortfolio."\n";
        return $res;
    }

    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}

//test
//$UnePage = new User(1,"nomPage",null,1);
//echo $UnePage;
?>