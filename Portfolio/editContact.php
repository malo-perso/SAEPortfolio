<?php

require ("../common/DB.inc.php");

session_start();

if(! isset($_SESSION['id_utilisateur'])) 
{
    header('Location: ..\connexion.php');
}
else 
{

    require_once( "../Twig/lib/Twig/Autoloader.php" );

    Twig_Autoloader::register();
    $twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

    $titre = "Édition des contacts";

    $titrecentre = "Contacts";

    $tpl = $twig->loadTemplate( "templateEditContacts.tpl" );

    $db = DB::getInstance();
    $CV = $db->getPage($_SESSION['id_utilisateur'],$_SESSION['id_portfolio'], "CV");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['typeContact']) && isset($_POST['contact']))
        {

            $nomContact = $_POST['nom'];
            $type       = $_POST['type'];

            $contact = new Contact($nomContact, $type); 

            if(ajouterContact($contact))
            {
                echo "Contact ajouté";
                //mise à jour bd CV
            
                if ($db == null) {
                    echo "Impossible de se connecter à la base de données !\n";
                }
                else {
                    
                    if ($db->updatePage($CV,"CV", $_SESSION['id_portfolio']))
                    {
                        echo "CV mis à jour";
                    }
                    else
                    {
                        echo "Erreur lors de la mise à jour du CV";
                    }
                }
            }
            else
            {
                echo "Erreur lors de l'ajout du contact";
            }
        }
    }

    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else {
        $CV = $db->getPage($_SESSION['id_utilisateur'],$_SESSION['id_portfolio'], "CV");
    }

    $tabContacts = $CV->getContacts();

    /*$tabContacts = array( new Contact("téléphone", "06 06 06 06 06"),
                        new Contact("email", "toto@gmail.com"),
                        new Contact("linkedin", "toto")
                        );*/


    echo $tpl->render( array("tabContacts"=>$tabContacts,"titre"=>$titre) );
}

?>