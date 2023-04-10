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

    $titre = "Consultation des contacts";

    $titrecentre = "Contacts";

    $tpl = $twig->loadTemplate( "templateConsultContacts.tpl" );

    $db = DB::getInstance();
    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else
    {
        $contact = $db->getPage('contact',$_GET['idPortfolio']);
        if($contact == null)
        {
            $tabContacts = array();
        }
        else {
            $tabContacts = json_decode($contact->getContenu(), false);
        }
    }


    echo $tpl->render( array("tabContacts"=>$tabContacts,"titre"=>$titre) );
}
?>