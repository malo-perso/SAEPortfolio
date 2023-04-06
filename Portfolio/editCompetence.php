<?php

include "../common/CV/competence.inc.php";

ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once( "../Twig/lib/Twig/Autoloader.php" );

Twig_Autoloader::register();
$twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

$titre = "Édition des compétences";

$titrecentre = "Compétences";

$tpl = $twig->loadTemplate( "templateEditCompetences.tpl" );

$softSkills = array( new Competence("Anglais"),
                     new Competence("Espagnol"),
                     new Competence("Allemand")
                   );

$hardSkills = array( new Competence("Java"),
                     new Competence("C++"),
                     new Competence("C#")
                   );


echo $tpl->render( array("softSkills"=>$softSkills,"hardSkills"=>$hardSkills,"titre"=>$titre,"titrecentre"=>$titrecentre) );
?>