<?php
ini_set('display_errors', 1);
require ('user.inc.php');
require ('page.inc.php');
require ('Portfolio.inc.php');
require ('CV/CV.inc.php');

class DB {
    private static $instance = null; //mémorisation de l'instance de DB pour appliquer le pattern Singleton
    private $connect=null; //connexion PDO à la base

      /************************************************************************/
      //	Constructeur gerant  la connexion à la base via PDO
      //	NB : il est non utilisable a l'exterieur de la classe DB
      /************************************************************************/	
    private function __construct() {

        $dbname = "rm211190"; //A MODIIER (nom de la base Postgres)
        $host="woody.iut.univ-lehavre.fr"; 
        $user="rm211190"; //A MODIFIER (login compte Postgres)
        $pwd = "123"; //A MODIFIER (mot de passe compte Postgres)
        $port = 5432; //on utilise le port local du tunnel SSH

        // Connexion à la base de données
        $connStr = 'pgsql:host='.$host.' port='.$port.' dbname='.$dbname; 
        //$dsn = 'mysql:host=localhost;dbname=aram';
        try {
        // Connexion à la base
            $this->connect = new PDO($connStr, $user, $pwd);
            //$this->connect = new PDO($dsn, 'root', '');
            //echo '1 => Connexion réussie !<br/>';
        // Configuration facultative de la connexion
        $this->connect->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER); 
        $this->connect->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION); 
        }
        catch (PDOException $e) {
            echo "\nprobleme de connexion :".$e->getMessage();
        }
        //echo '\n3=> deconnexion';
        return null;
    
    }
    

    /************************************************************************/
    //	Methode péermettant d'obtenir un objet instance de DB
    //	NB : cet objet est unique pour l'excution d'un même script PHP
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
            //echo "Erreur lors de l'exécution de la requête : " . $this->getLastError();
            return false;
        } elseif (empty($resultats)) {
            //Aucun utilisateur trouvé
            //echo "Aucun utilisateur trouvé";
            return false;
        } else {
            //utilisateurs trouvés
            //echo count($resultats) . " utilisateurs trouvés";
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


    public function isExiste($idPortfolio){
        //vérifier si un portfolio existe dans la base de données en fonction de son id
        $requete = "SELECT * FROM portfolio WHERE idPortfolio = ?";
        $tparam = array($idPortfolio);
        $resultats = $this->execQuery($requete,$tparam,'portfolio');
        if (!$resultats) {
            //Erreur lors de l'exécution de la requête
            //echo "Erreur lors de l'exécution de la requête :".$requete."</br>";
            return false;
        } elseif (empty($resultats)) {
            //Aucun portfolio trouvé
            //echo "Aucun portfolio trouvé";
            return false;
        } else {
            //echo count($resultats) . " portfolios trouvés";
            return true;
        }
    }

    public function isProprietaire($idPortfolio, $idUser){//marche ter/mais marche pas
        //vérifier si un portfolio appartient à un utilisateur en fonction de son id
        $requete = "SELECT * FROM portfolio WHERE idPortfolio = ? AND idUser = ?";
        $tparam = array($idPortfolio, $idUser);
        $resultats = $this->execQuery($requete,$tparam,'portfolio');
        if (!$resultats) {
            //Erreur lors de l'exécution de la requête
            //echo "Erreur lors de l'exécution de la requête :".$requete."</br>";
            return false;
        } elseif (empty($resultats)) {
            //Aucun portfolio trouvé
            //echo "Aucun portfolio trouvé";
            return false;
        } else {
            //echo "portfolio appartient à l'utilisateur";
            return true;
        }
    }

    public function isPublic($idPortfolio){
        //vérifier si un portfolio est public en fonction de son id
        $requete = "SELECT * FROM portfolio WHERE idPortfolio = ? AND estPublic = true";
        $tparam = array($idPortfolio);
        $resultats = $this->execQuery($requete,$tparam,'portfolio');
        if (!$resultats) {
            //Erreur lors de l'exécution de la requête
            //echo "Erreur lors de l'exécution de la requête :".$requete."</br>";
            return false;
        } elseif (empty($resultats)) {
            //Aucun portfolio trouvé
            //echo "Aucun portfolio trouvé";
            return false;
        } else {
            //echo "portfolio est public";
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
        $resultats = $this->execQuery($requete,$tparam,'user');
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
        $resultats = $this->execQuery($requete,$tparam,'user');
        //$row = $resultats->fetch(PDO::FETCH_ASSOC);
        $row = $resultats[0];
        //echo $row->getPrenom();
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

    public function getContenu($contenu,$idPortfolio){
        $requete ="SELECT contenu FROM portfolio WHERE contenu = ? AND idPortfolio = ?";
        $tparam = array($contenu,$idPortfolio);
        $resultats = $this->execQuery($requete,$tparam,'portfolio');
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
            if (null !==$row->getContenu()) {
                //L'objet est valide, on peut accéder à sa propriété "contenu"
                return $row->getContenu();
            } else {
                //La propriété "contenu" n'existe pas dans l'objet
                //echo "La propriété contenu n'existe pas dans l'objet";
                return null;
            }
        }
    }


    public function getUserID($login){
        $requete = "SELECT idUser FROM utilisateur WHERE mail = ?";
        $tparam = array($login);
        //var_dump($tparam);
        $resultats = $this->execQuery($requete,$tparam,'user');
        //var_dump($resultats);
        $row = $resultats[0];
        if (!$resultats) {
            //Erreur lors de l'exécution de la requête
            echo "Erreur lors de l'exécution de la requête : " /*. $this->getLastError()*/;
            return null;
        } elseif (empty($resultats)) {
            //Aucun utilisateur trouvé
            echo "Aucun utilisateur trouvé";
            return null;
        } else {
            return $resultats[0];

        }
    }

    public function getPortfolioByUser($idUser){
        $requete = "SELECT * FROM portfolio WHERE idUser = ?";
        $tparam = array($idUser);
        $resultats = $this->execQuery($requete,$tparam,'portfolio');
        if (!$resultats) {
            echo "Erreur lors de l'exécution de la requête : " /*. $this->getLastError()*/;
            return null;
        } elseif (empty($resultats)) {
            echo "Aucun portfolio trouvé";
            return null;
        } else {
            //echo count($resultats) . " portfolio trouvés";
            return $resultats;
        }
    }

    public function getPage($nompage,$idportfolio){
        //récupérer une page par son nom et son idPortfolio
        $requete = "SELECT * FROM page WHERE nomPage = ? AND idPortfolio = ?";
        $tparam = array($nompage,$idportfolio);
        $resultats = $this->execQuery($requete,$tparam,'page');
        //var_dump($resultats);
        if (!$resultats) {
            echo "Erreur lors de l'exécution de la requête : " ;
            return null;
        } elseif (empty($resultats)) {
            echo "Aucune page trouvée";
            return null;
        } else {
            //echo count($resultats) . " pages trouvées";
            return $resultats[0];
        }
    }

    public function getIdPortfolio($nomPortfolio){
        $requete = "SELECT idPortfolio FROM portfolio WHERE nomPortfolio LIKE ?";
        $tparam = array($nomPortfolio);
        $resultats = $this->execQuery($requete,$tparam,'portfolio');
        
        if (!$resultats) {
            //Erreur lors de l'exécution de la requête
            echo "Erreur lors de l'exécution de la requête";
            return null;
        } elseif (empty($resultats)) {
            //Aucun utilisateur trouvé
            echo "Aucun portfolio trouvé";
            return null;
        } else {
            echo "portfolio trouvé \n";
            $res = array();
            foreach ($resultats as $row) {
                $res[] = $row->getIdPortfolio();
            }
            return  $res;
        }
    }

    public function getUserByPortfolio($idportfolio)
    {
        $requete = "SELECT nom, prenom FROM portfolio NATURAL JOIN utilisateur WHERE idPortfolio = ?)";
        $tparam = array($idportfolio);
        $class = array('portfolio','utilisateur');
        $resultats = $this->execQuery($requete,$tparam, $class);
        if (!$resultats) {
            //Erreur lors de l'exécution de la requête
            echo "Erreur lors de l'exécution de la requête";
            return null;
        } elseif (empty($resultats)) {
            //Aucun utilisateur trouvé
            echo "Aucun user trouvé";
            return null;
        } else {
            echo "user trouvé \n";
            $res = array();
            foreach ($resultats as $row) {
                echo $row."<br>";
            }
            //return  $res;
        }
    }

    public function getPassword($email)
    {
        $requete = "SELECT mdp FROM utilisateur WHERE mail = ?";
        $tparam = array($email);
        $resultats = $this->execQuery($requete,$tparam,'user');
        $row = $resultats[0];
        if (!$resultats) {
            //Erreur lors de l'exécution de la requête
            echo "Erreur lors de l'exécution de la requête : " /*. $this->getLastError()*/;
            return null;
        } elseif (empty($resultats)) {
            //Aucun utilisateur trouvé
            echo "Aucun utilisateur trouvé";
            return null;
        } else {
            //L'objet est valide, on peut accéder à sa propriété "mdp"
            return $row->getMdp();
        }
    }

    /*****************************/
    //  Fonctions setters 
    /*****************************/

    public function updatePage($contenu, $nomPage, $idPortfolio)
    {
        $requete = 'UPDATE page SET contenu = ? WHERE nomPage = ? AND idPortfolio = ?';
        $tparam = array($contenu, $nomPage, $idPortfolio);
        return $this->execMaj($requete, $tparam);
    }

    public function setVisible($idPortfolio, $visible)
    {
        $requete = 'UPDATE portfolio SET estpublic = ? where idPortfolio = ?';
        $tparam = array($visible, $idPortfolio);
        return $this->execMaj($requete, $tparam);
    }

/*****************************/
    //  Fonctions add 
    /*****************************/
    public function addUser($mail, $prenom, $nom,$mdp)
    {
        $requete = "INSERT INTO utilisateur (prenom, nom, mdp, mail) VALUES (?, ?, ?, ?);";
        $tparam = array($prenom, $nom, $mdp, $mail);
        return $this->execMaj($requete, $tparam);
    }


    public function addPortfolio($idPortfolio)
    {   
        $requete = "INSERT INTO portfolio (nomPortfolio, estPublic, idUser) VALUES ('NewPortfolio', false, ?);";
        $tparam = array($idPortfolio);
        if ($this->execMaj($requete,$tparam)){
            $requete = "SELECT idPortfolio FROM portfolio WHERE idUser = ? ORDER BY idPortfolio DESC LIMIT 1";
            $tparam = array($idPortfolio);
            $id = $this->execQuery($requete,$tparam,'portfolio');
            $row = $id[0];
            if (!$id) {
                //Erreur lors de l'exécution de la requête
                //echo "Erreur lors de l'exécution de la requête : " . $this->getLastError();
                return null;
            } elseif (empty($id)) {
                //Aucun utilisateur trouvé
                //echo "Aucun utilisateur trouvé";
                return null;
            } else {
                if (null !==$row->getidportfolio()) {
                    //L'objet est valide, on peut accéder à sa propriété "contenu"
                    echo $row->getidportfolio();
                    //return true;
                    // création des pages en même temps que le portfolio
                    $requete = "INSERT INTO page (nomPage, contenu, idPortfolio) VALUES ('CV',null,?);";
                    $tparam = array($row->getidportfolio());
                    $this->execMaj($requete,$tparam);
                    $requete = "INSERT INTO page (nomPage, contenu, idPortfolio) VALUES ('Competences',null,?);";
                    $tparam = array($row->getidportfolio());
                    $this->execMaj($requete,$tparam);
                    $requete = "INSERT INTO page (nomPage, contenu, idPortfolio) VALUES ('Projets',null,?);";
                    $tparam = array($row->getidportfolio());
                    $this->execMaj($requete,$tparam);
                    $requete = "INSERT INTO page (nomPage, contenu, idPortfolio) VALUES ('Contact',null,?);";
                    $tparam = array($row->getidportfolio());
                    $this->execMaj($requete,$tparam);
                    $requete = "INSERT INTO page (nomPage, contenu, idPortfolio) VALUES ('Accueil',null,?);";
                    $tparam = array($row->getidportfolio());
                    $this->execMaj($requete,$tparam);
                } else {
                    //La propriété "contenu" n'existe pas dans l'objet
                    //echo "La propriété contenu n'existe pas dans l'objet";
                    return null;
                }
            }
        }
        else {
            return false;
        }
    }

    /*****************************/
    //  Fonctions remove 
    /*****************************/
    public function removePortfolio($idPortfolio)
    {   
        if ($this->removePage($idPortfolio)) { // appeler removePage avant le retour true
            $requete = 'DELETE FROM portfolio WHERE idPortfolio = ?';
            $tparam = array($idPortfolio);
            return $this->execMaj($requete, $tparam);
        } else {
            echo "Erreur lors de l'exécution de la requête : ";
            return false;
        }
    }
    
    public function removePage($idPortfolio)
    {
        $requete = 'DELETE FROM page WHERE idPortfolio = ?';
        $tparam = array($idPortfolio);
        if ($this->execMaj($requete, $tparam))
        {
            return true;
        } else {
            echo "Erreur lors de l'exécution de la requête : ";
            return false;
        }
    }
    



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
