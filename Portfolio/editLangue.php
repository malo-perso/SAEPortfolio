<?php

include "../common/DB.inc.php";


require_once( "../Twig/lib/Twig/Autoloader.php" );

Twig_Autoloader::register();
$twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

$titre = "Édition des langues";

$titrecentre = "Langues";

$tpl = $twig->loadTemplate( "templateEditLangues.tpl" );

$db = DB::getInstance();
$CV = $db->getPage($_SESSION['id_utilisateur'],$_SESSION['id_portfolio'], "CV");

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['langue']) && isset($_POST['niveau']))
    {

        $langue = $_POST['langue'];
        $niveau = $_POST['niveau'];

        $langue = new Langue($langue, $niveau);

        if(ajouterLangue($langue))
        {
            echo "Langue ajoutée";
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
            echo "Erreur lors de l'ajout des langues";
        }
            
    }

    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else {
        $CV = $db->getPage($_SESSION['id_utilisateur'],$_SESSION['id_portfolio'], "CV");
    }
}

$tabLangues = $CV->getLangues();


echo $tpl->render( array("tabLangues"=>$tabLangues,"titre"=>$titre) );
?>