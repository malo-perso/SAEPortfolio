<?php
ini_set('display_errors', 1);
require ("../common/DB.inc.php");
include("../common/fctAux.inc.php");

session_start();

if(!gestionAcces()) {
    echo "Accès refusé errorrrrrr";
}
else{

    require_once( "../Twig/lib/Twig/Autoloader.php" );

    Twig_Autoloader::register();
    $twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

    $titre = "Édition des coordonnées";

    $titrecentre = "Coordonnées";

    $tpl = $twig->loadTemplate( "templateEditCoordonnees.tpl" );

    $db = DB::getInstance();
    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else 
    {
        $CV = $db->getPage('CV',$_GET['idPortfolio']);
        $contenu = json_decode($CV->getContenu(), false);
        $CV_courant = new CV($contenu);
    }
    //$coordonnees = $CV->getCoordonnees();
    $coordonnees = $CV_courant->__get("coordonnees");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['intitulePoste']) && isset($_POST['adr']) && isset($_POST['codePostal']) && isset($_POST['ville']) && isset($_POST['tel']) && isset($_POST['mail']))
        {
            $prenom = $_POST['prenom'];
            $nom = $_POST['nom'];
            $intitulePoste = $_POST['intitulePoste'];
            $adr = $_POST['adr'];
            $codePostal = $_POST['codePostal'];
            $ville = $_POST['ville'];
            $tel = $_POST['tel'];
            $mail = $_POST['mail'];
            $accroche = $_POST['accroche'];

            if (isset($_POST["avatar-file"]))
            {
                $avatar = $_POST["avatar-file"];
                $coordonnees = new Coordonnees($avatar, $nom, $prenom, $intitulePoste, $adr, $codePostal, $ville, $tel, $mail, $accroche);
            }
            else
            {
                $coordonnees = new Coordonnees("", $nom, $prenom, $intitulePoste, $adr, $codePostal, $ville, $tel, $mail, $accroche);
            }
        
            if(ajouterCoordonnees($coordonnees))
            {
                echo "Coordonnées ajoutées";
                //mise à jour bd CV
            
                if ($db == null) {
                    echo "Impossible de se connecter à la base de données !\n";
                }
                else {
                    
                    if ($db->updatePage($CV,"CV", $_GET['idPortfolio']))
                    {
                        echo "CV mis à jour";
                    }
                    else
                    {
                        echo "Erreur lors de la mise à jour du CV";
                    }
                }
            }
            else
            {
                echo "Erreur lors de l'ajout des coordonnées";
            }
                
        }

    }

    echo $tpl->render( array("coordonnees"=>$coordonnees,"titre"=>$titre) );
}
?>