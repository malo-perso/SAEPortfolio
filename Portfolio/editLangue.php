<?php

include "../common/langue.inc.php";

ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once( "../Twig/lib/Twig/Autoloader.php" );

Twig_Autoloader::register();
$twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

$titre = "Édition des langues";

$titrecentre = "Langues";

$tpl = $twig->loadTemplate( "templateEditLangues.tpl" );

$langues = array( new Langue("Anglais", "Intermédiaire (B2)"),
                  new Langue("Espagnol", "Intermédiaire (B2)"),
                  new Langue("Allemand", "Intermédiaire (B2)")
                );


echo $tpl->render( array("langues"=>$langues,"titre"=>$titre,"titrecentre"=>$titrecentre) );
?>