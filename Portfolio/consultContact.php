<?php

include "../common/contact.inc.php";


require_once( "../Twig/lib/Twig/Autoloader.php" );

Twig_Autoloader::register();
$twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

$titre = "Consultation des contacts";

$titrecentre = "Contacts";

$tpl = $twig->loadTemplate( "templateConsultContacts.tpl" );

$tabContacts = array( new Contact(0, "téléphone", "06 06 06 06 06"),
                      new Contact(1, "email", "toto@gmail.com"),
                      new Contact(2, "linkedin", "toto")
                    );


echo $tpl->render( array("tabContacts"=>$tabContacts,"titre"=>$titre) );
?>