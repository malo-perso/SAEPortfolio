<?php

class Competences implements JsonSerializable
{
    private static $compteur = 0;

    private $idComp;
    private $softSkills = array();
    private $hardSkills = array();

    public function __construct($softSkills, $hardSkills)
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


    public function __toString() {
        return "idComp : " . $this->idComp . " softSkills : " . $this->softSkills . " hardSkills : " . $this->hardSkills;
    }

    public function jsonSerialize() : array
    {
        $vars = get_object_vars($this);
        return $vars;
    }
}


?>