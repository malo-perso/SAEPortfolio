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

    $titre = "Édition des langues";

    $titrecentre = "Langues";

    $tpl = $twig->loadTemplate( "templateEditLangues.tpl" );

    $db = DB::getInstance();
    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else 
    {
        $CV = $db->getPage('CV',$_GET['idPortfolio']);
        $contenu = json_decode($CV->getContenu(), true);
        $CV_courant = new CV();
        $CV_courant->tabToCV($contenu);

        $tabLangues = $CV_courant->getTabLangues();
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['langue']) && isset($_POST['niveau']))
        {

            $langue = $_POST['langue'];
            $niveau = $_POST['niveau'];

            $langue = new Langue($langue, $niveau);

            $CV_courant->ajouterLangue($langue);

            echo "Langue ajoutée";

            $json = json_encode($CV_courant);
      
            if ($db->updatePage($json,"CV", $_GET['idPortfolio']))
            {
                echo "CV mis à jour";
                unset($_POST['langue'], $_POST['niveau']);
            }
            else
            {
                echo "Erreur lors de la mise à jour du CV";
            }                
        }
        else
        {
            echo "Les champs n'ont pas été correctement remplis";
        }
    }

    $tabLangues = $CV_courant->getTabLangues();

    echo $tpl->render( array("tabLangues"=>$tabLangues,"titre"=>$titre) );
}
?>