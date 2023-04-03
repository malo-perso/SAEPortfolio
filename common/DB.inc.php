<?php

require ('utilisateur.inc.php');
//require '.inc.php';
//require '.inc.php';
//require '.inc.php';
//require '.inc.php';

class DB {
    private static $instance = null; //mémorisation de l'instance de DB pour appliquer le pattern Singleton
    private $connect=null; //connexion PDO à la base

      /************************************************************************/
      //	Constructeur gerant  la connexion à la base via PDO
      //	NB : il est non utilisable a l'exterieur de la classe DB
      /************************************************************************/	
    private function __construct() {
            // Connexion à la base de données
        //$connStr = 'pgsql:host=woody port=5432 dbname=rm211190'; // A MODIFIER ! 
        $dsn = 'mysql:host=localhost;dbname=aram';
        try {
        // Connexion à la base
            //$this->connect = new PDO($connStr, 'rm211190', ''); //A MODIFIER !
            $this->connect = new PDO($dsn, 'root', '');
            //echo '1 => Connexion réussie !<br/>';
        // Configuration facultative de la connexion
        $this->connect->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); 
        $this->connect->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION); 
        }
        catch (PDOException $e) {
            echo "probleme de connexion :".$e->getMessage();
        }
        return null;
    }

    /************************************************************************/
    //	Methode permettant d'obtenir un objet instance de DB
    //	NB : cet objet est unique pour l'exécution d'un même script PHP
    //	NB2: c'est une methode de classe.
    /************************************************************************/
    public static function getInstance() {
      	if (is_null(self::$instance)) {
 	     	try {
		      self::$instance = new DB(); 
 		} 
		catch (PDOException $e) {
			echo $e;
 		}
            } //fin IF
 	    $obj = self::$instance;

	    if (($obj->connect) == null) {
	       self::$instance=null;
	    }
	    return self::$instance;
    } //fin getInstance

    /************************************************************************/
    //	Methode permettant de fermer la connexion a la base de données
    /************************************************************************/
    public function close() {
        $this->connect = null;
    }

    /************************************************************************/
    //	Exécution requête SQL
    /************************************************************************/
    private function execQuery($requete,$tparam,$nomClasse) {
        $stmt = $this->connect->prepare($requete);
        $stmt->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, $nomClasse); 
        //on exécute la requête
	    if ($tparam != null) {
            $stmt->execute($tparam);
        }
        else {
            $stmt->execute();
        }
        //récupération du résultat de la requête sous forme d'un tableau d'objets
        $tab = array();
        $tuple = $stmt->fetch(); //on récupère le premier tuple sous forme d'objet
        if ($tuple) {
            //au moins un tuple a été renvoyé
                   while ($tuple != false) {
              $tab[]=$tuple; //on ajoute l'objet en fin de tableau
                        $tuple = $stmt->fetch(); //on récupère un tuple sous la forme
                       //d'un objet instance de la classe $nomClasse	       
            } //fin du while	           	     
            }
        return $tab;
    }
    /************************************************************************/
    //
    /************************************************************************/

    private function execMaj($ordreSQL,$tparam) {
        $stmt = $this->connect->prepare($ordreSQL);
        $res = $stmt->execute($tparam); //execution de l'ordre SQL      	     
        return $stmt->rowCount();
    }

    /************************************************************************/
    //  Fonctions des requêtes
    /************************************************************************/
    /*****************************/
    //  Fonctions vérification 
    /*****************************/
    
    public function isemailOK($mail){
        $requete = "SELECT * FROM utilisateur WHERE mail = ?";
        $tparam = array($mail);
        $resultats = $this->execQuery($requete,$tparam,'utilisateur');
        if (!$resultats) {
            //Erreur lors de l'exécution de la requête
            echo "Erreur lors de l'exécution de la requête : " . $this->getLastError();
            return false;
        } elseif (empty($resultats)) {
            //Aucun utilisateur trouvé
            echo "Aucun utilisateur trouvé";
            return false;
        } else {
            //utilisateurs trouvés
            echo count($resultats) . " utilisateurs trouvés";
            return true;
        }
    }

    public function isMotDePasseOK($mail,$mdp){
        $requete = "SELECT * FROM utilisateur WHERE mail = ? AND mdp = ?";
        $tparam = array($mail,$mdp);
        $resultats = $this->execQuery($requete,$tparam,'utilisateur');
        if (!$resultats) {
            //Erreur lors de l'exécution de la requête
            //echo "Erreur lors de l'exécution de la requête : " . $this->getLastError();
            return false;
        } elseif (empty($resultats)) {
            //Aucun utilisateur trouvé
            //echo "Aucun utilisateur trouvé";
            return false;
        } else {
            //echo count($resultats) . " utilisateurs trouvés";
            return true;
        }
    }
    /*****************************/
    //  Fonctions getters 
    /*****************************/

    //récupérer le nom, prénom métier de tous les utilisateurs qui ont un portfolio publié
    /*public function getUserPortfolioPublie() {
        $requete = "SELECT nom,prenom FROM utilisateur WHERE idUser IN (SELECT idUser FROM portfolio WHERE estPublic = true)";
        return $this->execQuery($requete,null,'Utilisateur');
    }
    */

    public function getUserPortfolioPublie() {
        $requete = "SELECT nom,prenom FROM utilisateur WHERE idUser IN (SELECT idUser FROM portfolio WHERE estPublic = true)";
        $resultats = $this->execQuery($requete,null,'utilisateur');
        var_dump($resultats);
        if (!$resultats) {
            //echo "Erreur lors de l'exécution de la requête : " . $this->getLastError();
            return null;
        } elseif (empty($resultats)) {
            //echo "Aucun utilisateur trouvé";
            return null;
        } else {
            //echo count($resultats) . " utilisateurs trouvés";
            return $resultats;
        }
    }
    
    public function getNom($mail){
        $requete = "SELECT nom FROM utilisateur WHERE mail = ?";
        $tparam = array($mail);
        $resultats = $this->execQuery($requete,$tparam,'utilisateur');
        $row = $resultats[0];
        if (!$resultats) {
            //Erreur lors de l'exécution de la requête
            return null;
        } elseif (empty($resultats)) {
            //Aucun utilisateur trouvé
            return null;
        } else {
            if (null !==$row->getNom()) {
                //L'objet est valide, on peut accéder à sa propriété "nom"
                return $row->getNom();
            } else {
                //La propriété "nom" n'existe pas dans l'objet
                return null;
            }
        }
    }

    public function getPrenom($mail){
        $requete = "SELECT prenom FROM utilisateur WHERE mail = ?";
        $tparam = array($mail);
        $resultats = $this->execQuery($requete,$tparam,'utilisateur');
        //$row = $resultats->fetch(PDO::FETCH_ASSOC);
        $row = $resultats[0];
        if (!$resultats) {
            //Erreur lors de l'exécution de la requête
            //echo "Erreur lors de l'exécution de la requête : " . $this->getLastError();
            return null;
        } elseif (empty($resultats)) {
            //Aucun utilisateur trouvé
            //echo "Aucun utilisateur trouvé";
            return null;
        } else {
            if (null !==$row->getPrenom()) {
                //L'objet est valide, on peut accéder à sa propriété "prenom"
                return $row->getPrenom();
            } else {
                //La propriété "prenom" n'existe pas dans l'objet
                //echo "La propriété prenom n'existe pas dans l'objet";
                return null;
            }
        }
    }

    /*****************************/
    //  Fonctions setters 
    /*****************************/

    //récupérer le mot de passe d'un utilisateur par son mail ou son pseudo


    //récupérer un utilisateur par son identifiant
    //récupérer un portfolio par son identifiant
    //récupérer une page par son nom
    //créer un utilisateur  
        //créer un portfolio
            //créer une page de chaque
    //suprimer un utilisateur
    //suprimer un portfolio
    //suprimer une page
    //modifier un utilisateur
    //modifier un portfolio
    //modifier une page
    //récupérer les pages d'un portfolio d'un utilisateur
    //récupérer les portfolios d'un utilisateur
}
?>