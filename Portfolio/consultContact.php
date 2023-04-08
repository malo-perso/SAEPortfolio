<?php

include "../common/contact.inc.php";


require_once( "../Twig/lib/Twig/Autoloader.php" );

Twig_Autoloader::register();
$twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

$titre = "Consultation des contacts";

$titrecentre = "Contacts";

$tpl = $twig->loadTemplate( "templateConsultContacts.tpl" );

$tabContacts = array( new Contact("téléphone", "06 06 06 06 06"),
                      new Contact("email", "toto@gmail.com"),
                      new Contact("linkedin", "toto")
                    );


echo $tpl->render( array("tabContacts"=>$tabContacts,"titre"=>$titre) );
?>