<?php
class portfolio {

    private $idportfolio;
    private $nomportfolio;
    private $estpublic;
    private $iduser;
      
    public function __construct($idportfolio="",$nomportfolio="",$estpublic="", $iduser="") {
        $this->idportfolio = $idportfolio;
        $this->nomportfolio = $nomportfolio;
        $this->estpublic = $estpublic;
        $this->iduser = $iduser;
    }

    public function getidportfolio() { return $this->idportfolio; }
    public function getnomportfolio() { return $this->nomportfolio;}
    public function getestpublic() { return $this->estpublic; }
    public function getiduser() { return $this->iduser; }

    public function __toString() {
        $res = "idportfolio:".$this->idportfolio."\n";
        $res = $res ."nomportfolio:".$this->nomportfolio."\n";
        $res = $res ."estpublic:".$this->estpublic."\n";
        $res = $res ."iduser:".$this->iduser."\n";
        return $res;
    }
}

?>