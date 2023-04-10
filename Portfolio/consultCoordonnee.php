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

    $titre = "Consultation des coordonnées";

    $titrecentre = "Coordonnées";

    $tpl = $twig->loadTemplate( "templateConsultCoordonnees.tpl" );

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

    echo $tpl->render( array("coordonnees"=>$coordonnees,"titre"=>$titre) );
}
?>