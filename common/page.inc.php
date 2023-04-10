<?php

class Page implements JsonSerializable{

    private $idpage;
    private $nompage;
    private $contenu;
    private $idportfolio;
      
    public function __construct($idpage="",$nompage="",$contenu="",$idportfolio="") {
        $this->idpage = $idpage;
        $this->nompage = $nompage;
        $this->contenu = $contenu;
        $this->idportfolio = $idportfolio;
    }

    public function getIdPage() { return $this->idpage; }
    public function getNomPage() { return $this->nompage;}
    public function getContenu() { return $this->contenu; }
    public function getIdPortfolio() { return $this->idportfolio; }

    public function __toString() {
        $res = "idpage:".$this->idpage."\n";
        $res = $res ."nompage:".$this->nompage."\n";
        $res = $res ."contenu:".$this->contenu."\n";
        $res = $res ."idPortfolio:".$this->idportfolio."\n";
        return $res;
    }

    public function jsonSerialize() : array 
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}

//test
//$UnePage = new User(1,"nomPage",null,1);
//echo $UnePage;
?>