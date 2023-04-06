<?php

include "../common/CV/langue.inc.php";

ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once( "../Twig/lib/Twig/Autoloader.php" );

Twig_Autoloader::register();
$twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

$titre = "Édition des langues";

$titrecentre = "Langues";

$tpl = $twig->loadTemplate( "templateEditLangues.tpl" );

$tabLangues = array( new Langue(0, "Anglais", "Intermédiaire (B2)"),
                     new Langue(1, "Espagnol", "Intermédiaire (B2)"),
                     new Langue(2, "Allemand", "Intermédiaire (B2)")
                   );


echo $tpl->render( array("tabLangues"=>$tabLangues,"titre"=>$titre,"titrecentre"=>$titrecentre) );
?>