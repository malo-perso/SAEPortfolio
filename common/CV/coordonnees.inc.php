<?php

class Coordonnees implements JsonSerializable
{
    private $image;
    private $prenom;
    private $nom;
    private $nomPoste;
    private $adresse;
    private $codePostal;
    private $ville;
    private $telephone;
    private $email;
    private $phraseAccroche;

    public function __construct($img = "", $p = "", $n = "", $nPoste = "", $adr = "", $cp = "", $v = "", $tel = "", $mail = "", $pAccroche = "")
    {
        $this->image            = $img;
        $this->prenom           = $p;
        $this->nom              = $n;
        $this->nomPoste         = $nPoste;
        $this->adresse          = $adr;
        $this->codePostal       = $cp;
        $this->ville            = $v;
        $this->telephone        = $tel;
        $this->email            = $mail;
        $this->phraseAccroche   = $pAccroche;
    }

    public function getImage        () { return $this->image;          }
    public function getPrenom       () { return $this->prenom;         }
    public function getNom          () { return $this->nom;            }
    public function getNomPoste     () { return $this->nomPoste;       }
    public function getAdresse      () { return $this->adresse;        }
    public function getCodePostal   () { return $this->codePostal;     }
    public function getVille        () { return $this->ville;          }
    public function getTelephone    () { return $this->telephone;      }
    public function getEmail        () { return $this->email;          }
    public function getPhraseAccroche(){ return $this->phraseAccroche; }

    public function __toString()
    {
        $res = "image:" . $this->image . "\n";
        $res = $res . "prenom:" . $this->prenom . "\n";
        $res = $res . "nom:" . $this->nom . "\n";
        $res = $res . "nomPoste:" . $this->nomPoste . "\n";
        $res = $res . "adresse:" . $this->adresse . "\n";
        $res = $res . "codePostal:" . $this->codePostal . "\n";
        $res = $res . "ville:" . $this->ville . "\n";
        $res = $res . "telephone:" . $this->telephone . "\n";
        $res = $res . "email:" . $this->email . "\n";
        $res = $res . "phraseAccroche:" . $this->phraseAccroche . "\n";
        $res = $res . "<br/>";
        return $res;
    }

    public function jsonSerialize() : array
    {
        $vars = get_object_vars($this);
        return $vars;
    }


}