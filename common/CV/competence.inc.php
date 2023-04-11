<?php

class Competences implements JsonSerializable
{
    private static $compteur = 0;

    private $idComp;
    private $softSkills = array();
    private $hardSkills = array();

    public function __construct($softSkills = array("Communiquer"), $hardSkills = array("Java","SQL","CSS"))
    {
        $this->idComp = ++self::$compteur;
        $this->softSkills = $softSkills;
        $this->hardSkills = $hardSkills;
    }

    public function getIdComp()
    {
        return $this->idComp;
    }

    public function getSoftSkills()
    {
        return $this->softSkills;
    }

    public function getHardSkills()
    {
        return $this->hardSkills;
    }

    public function addSoftSkill($softSkill)
    {
        array_push($this->softSkills, $softSkill);
    }


    public function __toString() {
        $res = "idComp : " . $this->idComp . "\n";

        for ($i = 0; $i < count($this->softSkills); $i++) {
            $res = $res . "softSkills : " . $this->softSkills[$i] . "\n";
        }

        for ($i = 0; $i < count($this->hardSkills); $i++) {
            $res = $res . "hardSkills : " . $this->hardSkills[$i] . "\n";
        }

        return $res;


    }

    public function jsonSerialize() : array
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}


?>