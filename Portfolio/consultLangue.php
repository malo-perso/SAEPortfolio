<?php

include "../common/CV/langue.inc.php";


require_once( "../Twig/lib/Twig/Autoloader.php" );

Twig_Autoloader::register();
$twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

$titre = "Consultation des langues";

$titrecentre = "Langues";

$tpl = $twig->loadTemplate( "templateConsultLangues.tpl" );

$tabLangues = array( new Langue("Anglais", "Intermédiaire (B2)"),
                     new Langue("Espagnol", "Intermédiaire (B2)"),
                     new Langue("Allemand", "Intermédiaire (B2)")
                   );


echo $tpl->render( array("tabLangues"=>$tabLangues,"titre"=>$titre) );
?>