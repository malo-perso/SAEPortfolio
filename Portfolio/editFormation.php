<?php

include "../common/formation.inc.php";

ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once( "../Twig/lib/Twig/Autoloader.php" );

Twig_Autoloader::register();
$twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

$titre = "Édition des formations";

$titrecentre = "Formations";

$tpl = $twig->loadTemplate( "templateEditFormations.tpl" );

$tabFormations = array( new Formation("Ecole de la Paix", "Paris", "Licence", "Droit", "09-2010", "06-2013"),
                        new Formation("Iut du Havre", "Havre", "BUT", "Informatique", "09-2010", "06-2013"),
                        new Formation("Ecole de la Paix", "Paris", "Licence", "Droit", "09-2010", "06-2013")
                      );


echo $tpl->render( array("tabFormations"=>$tabFormations,"titre"=>$titre,"titrecentre"=>$titrecentre) );
?>