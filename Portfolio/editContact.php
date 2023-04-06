<?php

include "../common/contact.inc.php";

ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once( "../Twig/lib/Twig/Autoloader.php" );

Twig_Autoloader::register();
$twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

$titre = "Édition des contacts";

$titrecentre = "Contacts";

$tpl = $twig->loadTemplate( "templateEditContacts.tpl" );

$tabContacts = array( new Contact(0, "téléphone", "06 06 06 06 06"),
                      new Contact(1, "email", "toto@gmail.com"),
                      new Contact(2, "linkedin", "toto")
                    );


echo $tpl->render( array("tabContacts"=>$tabContacts,"titre"=>$titre,"titrecentre"=>$titrecentre) );
?>