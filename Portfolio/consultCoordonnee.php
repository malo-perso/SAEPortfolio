<?php

include "../common/CV/coordonnees.inc.php";


require_once( "../Twig/lib/Twig/Autoloader.php" );

Twig_Autoloader::register();
$twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

$titre = "Consultation des coordonnées";

$titrecentre = "Coordonnées";

$tpl = $twig->loadTemplate( "templateConsultCoordonnees.tpl" );

$coordonnees = new Coordonnees(0, "../images/logo.png","Malet", "Riho", "Développeur Web", "25 rue des Camélias", "75000", "Paris", "06 06 06 06 06", "malet.riho@gmail.com", "Carpe Diem.");

echo $tpl->render( array("coordonnees"=>$coordonnees,"titre"=>$titre) );
?>