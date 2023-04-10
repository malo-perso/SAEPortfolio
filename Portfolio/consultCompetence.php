<?php

require ("../common/DB.inc.php");
include ("../common/fctAux.inc.php");

session_start();

if(!gestionAcces()) 
{
    echo "Accès refusé errorrrrrr";
}
else 
{
    require_once( "../Twig/lib/Twig/Autoloader.php" );

    Twig_Autoloader::register();
    $twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

    $titre = "Consultation de la page Competences";

    $titrecentre = "Competences";

    $tpl = $twig->loadTemplate( "templateConsultCompetences.tpl" );

    $db = DB::getInstance();
    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else
    {
        $Competences = $db->getPage('Competences',$_GET['idPortfolio']);
        $contenu = json_decode($Competences->getContenu(), false);
    }

    echo $tpl->render( array( 'titre' => $titre, 'titrecentre' => $titrecentre, 'contenu' => $contenu ) );
}
?>

