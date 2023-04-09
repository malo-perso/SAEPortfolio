<?php

include "../common/DB.inc.php";


require_once( "../Twig/lib/Twig/Autoloader.php" );

Twig_Autoloader::register();
$twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

$titre = "Édition des coordonnées";

$titrecentre = "Coordonnées";

$tpl = $twig->loadTemplate( "templateEditCoordonnees.tpl" );

$db = DB::getInstance();
$CV = $db->getPage($_SESSION['id_utilisateur'],$_SESSION['id_portfolio'], "CV");

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
                
                if ($db->updatePage($CV,"CV", $_SESSION['id_portfolio']))
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

    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else 
    {
        $CV = $db->getPage($_SESSION['id_utilisateur'],$_SESSION['id_portfolio'], "CV");
    }

}

$coordonnees = $CV->getCoordonnees();


echo $tpl->render( array("coordonnees"=>$coordonnees,"titre"=>$titre) );

?>