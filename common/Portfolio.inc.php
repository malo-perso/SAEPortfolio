<?php
class portfolio {

    private $idPortfolio;
    private $nomPortfolio;
    private $estPublic;
    private $idUser;
      
    public function __construct($i="",$n="",$e="", $u="") {
        $this->idPortfolio = $i;
        $this->nomPortfolio = $n;
        $this->estPublic = $e;
        $this->idUser = $u;
    }

    public function getIdPortfolio() { return $this->idPortfolio; }
    public function getNomPortfolio() { return $this->nomPortfolio;}
    public function getEstPublic() { return $this->estPublic; }
    public function getIdUser() { return $this->idUser; }

    public function __toString() {
        $res = "idPortfolio:".$this->idPortfolio."\n";
        $res = $res ."nomPortfolio:".$this->nomPortfolio."\n";
        $res = $res ."estPublic:".$this->estPublic."\n";
        $res = $res ."idUser:".$this->idUser."\n";
        return $res;
    }
}

?>