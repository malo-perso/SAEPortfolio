<?php

ini_set('display_errors', 1);
require ("../common/DB.inc.php");
include("../common/fctAux.inc.php");


require_once( "../Twig/lib/Twig/Autoloader.php" );

session_start();

if(!gestionAcces()) {
    echo "Accès refusé errorrrrrr";
}
else{

    Twig_Autoloader::register();
    $twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

    $titre = "Consultation de l'accueil";

    $titrecentre = "Accueil";

    $tpl = $twig->loadTemplate( "templateConsultAccueil.tpl" );

    $db = DB::getInstance();
    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else
    {
        $accueil = $db->getPage('Accueil',$_GET['idPortfolio']);
        if($accueil == null)
        {
            $contenu = array();
        }
        else {
            $contenu = json_decode($accueil->getContenu(), false);
        }
    }


    echo $tpl->render( array("contenu"=>$contenu,"titre"=>$titre) );
}
?>