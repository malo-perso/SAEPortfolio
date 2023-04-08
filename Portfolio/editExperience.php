<?php

include "../common/CV/experience.inc.php";


require_once( "../Twig/lib/Twig/Autoloader.php" );

Twig_Autoloader::register();
$twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

$titre = "Édition des expériences";

$titrecentre = "Expériences";

$tpl = $twig->loadTemplate( "templateEditExperiences.tpl" );

$tabExperiences = array( new Experience("Développeur", "Sopra Steria", "Paris", "CDI", "01-01-2015", "01-01-2016"),
                         new Experience("Chaudronnier", "SCPM", "Le Havre", "CDD", "01-01-2015", "01-01-2016"),
                         new Experience("Chevalier", "Le Roi Arthur", "Camelot", "CDI", "01-01-490", "01-01-515")
                       );


echo $tpl->render( array("tabExperiences"=>$tabExperiences,"titre"=>$titre) );
?>