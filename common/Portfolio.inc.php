<?php
class portfolio {

    private $idPortfolio;
    private $nomPortfolio;
    private $estPublic;
      
    public function __construct($i="",$n="",$e="") {
        $this->idPortfolio = $i;
        $this->nomPortfolio = $n;
        $this->estPublic = $e;
    }

    public function getIdPortfolio() { return $this->idPortfolio; }
    public function getNomPortfolio() { return $this->nomPortfolio;}
    public function getEstPublic() { return $this->estPublic; }

    public function __toString() {
        $res = "idPortfolio:".$this->idPortfolio."\n";
        $res = $res ."nomPortfolio:".$this->nomPortfolio."\n";
        $res = $res ."estPublic:".$this->estPublic."\n";
        return $res;
    }
}

?>