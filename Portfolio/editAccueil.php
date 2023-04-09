<?php

include "../common/page.inc.php";

require_once( "../Twig/lib/Twig/Autoloader.php" );

Twig_Autoloader::register();
$twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

$titre = "Édition de la page Accueil";

$titrecentre = "Accueil";

$tpl = $twig->loadTemplate( "templateEditAccueil.tpl" );

?>

