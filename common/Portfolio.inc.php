CREATE TABLE portfolio(
    idPortfolio SERIAL PRIMARY KEY,
    nomPortfolio VARCHAR(20) NOT NULL,
    estPublic BOOLEAN NOT NULL,
);
<?php
class portfolio {
      /*avec PDO, il faut que les noms attributs soient les mêmes que ceux de la table*/
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