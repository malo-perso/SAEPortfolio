<?php


class Experience implements \JsonSerializable {

    private static $compteur = 0;

    private $idExperience;
    private $intitulePoste;
    private $nomEmployeur;
    private $villeEmployeur;
    private $typeContrat;
    private $dateDebutMois;
    private $dateDebutAnnee;
    private $dateFinMois;
    private $dateFinAnnee;


    public function __construct($idExp = "", $intitule = "", $nomEmp = "", $villeEmp = "", $typeContrat = "", $dateDebutMois = "", $dateDebutAnnee = "", $dateFinMois = "", $dateFinAnnee = "") {
        $this->idExperience = $idExp;
        $this->intitulePoste = $intitule;
        $this->nomEmployeur = $nomEmp;
        $this->villeEmployeur = $villeEmp;
        $this->typeContrat = $typeContrat;
        $this->dateDebutMois = $dateDebutMois;
        $this->dateDebutAnnee = $dateDebutAnnee;
        $this->dateFinMois = $dateFinMois;
        $this->dateFinAnnee = $dateFinAnnee;
    }

    public function __toString() {
        $res = "Intitulé du poste : ".$this->intitulePoste."\n";
        $res = $res ."<br/>";
        $res = $res . "Nom de l'employeur : ".$this->nomEmployeur."\n";
        $res = $res ."<br/>";
        $res = $res . "Ville de l'employeur : ".$this->villeEmployeur."\n";
        $res = $res ."<br/>";
        $res = $res . "Type de contrat : ".$this->typeContrat."\n";
        $res = $res ."<br/>";
        $res = $res . "Date de début : ".$this->dateDebutMois."/".$this->dateDebutAnnee."\n";
        $res = $res ."<br/>";
        $res = $res . "Date de fin : ".$this->dateFinMois."/".$this->dateFinAnnee."\n";
        $res = $res ."<br/>";
        return $res;
    }

    public function jsonSerialize() : array
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}

//test
//$uneExperience = new Experience(1, 'Développeur', 'Sopra Steria', 'Paris', 'CDI', '01/01/2015', '01/01/2016');
//echo $uneExperience;
?>