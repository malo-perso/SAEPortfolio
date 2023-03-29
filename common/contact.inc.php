<?php


class Contact {

    private $idcontact;
    private $nomcontact;
    private $desccontact;

      
    public function __construct($i=-1,$n="",$d="") {
      	$this->idcontact = $i;
	    $this->nomcontact = $n;
	    $this->desccontact = $d;
    }

    public function getIdcontact() { return $this->idcontact; }
    public function getNomcontact() { return $this->nomcontact; }
    public function getDesccontact() { return $this->desccontact; }

    public function __toString() {
      	$res = "idcli:".$this->idcontact."\n";
        $res = $res ."nomcontact:".$this->nomcontact."\n";
        $res = $res ."desccontact:".$this->desccontact."\n";
        $res = $res ."<br/>";
	    return $res;
    }
}

//test
//$uncontact = new Contact(1, 'messagerie', 'jolibonhomme31@gmail.com');o
//echo $uncontact;
?>