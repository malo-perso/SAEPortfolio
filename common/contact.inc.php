<?php


class Contact implements \JsonSerializable {

    private $idContact;
    private $nomContact;
    private $descContact;


    public function __construct($i=-1,$n="",$d="") {
      	$this->idContact = $i;
	      $this->nomContact = $n;
	      $this->descContact = $d;
    }

    public function getIdContact  () { return $this->idContact; }
    public function getNomContact () { return $this->nomContact; }
    public function getDescContact() { return $this->descContact; }

    public function __toString() {
      	$res = "idContact:".$this->idContact."\n";
        $res = $res ."nomContact:".$this->nomContact."\n";
        $res = $res ."descContact:".$this->descContact."\n";
        $res = $res ."<br/>";
	      return $res;
    }

    public function jsonSerialize()
    {
      $vars = get_object_vars($this);
      return $vars;
    }
}


//test
//$unContact = new Contact(1, 'messagerie', 'jolibonhomme31@gmail.com');o
//echo $unContact;
?>