<?php

include "../common/CV/competence.inc.php";


require_once( "../Twig/lib/Twig/Autoloader.php" );

Twig_Autoloader::register();
$twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

$titre = "Consultation des compétences";

$titrecentre = "Compétences";

$tpl = $twig->loadTemplate( "templateConsultCompetences.tpl" );

$softSkills = array( new Competence("Anglais"),
                     new Competence("Espagnol"),
                     new Competence("Allemand")
                   );

$hardSkills = array( new Competence("Java"),
                     new Competence("C++"),
                     new Competence("C#")
                   );


echo $tpl->render( array("softSkills"=>$softSkills,"hardSkills"=>$hardSkills,"titre"=>$titre));
?>