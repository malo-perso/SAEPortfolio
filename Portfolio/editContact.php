<?php

require ("../common/DB.inc.php");
include ("../common/fctAux.inc.php");

session_start();

if(!gestionAcces()) 
{
    echo "Accès refusé errorrrrrr";
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
    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else 
    {
        $pageContact = $db->getPage('Contact',$_GET['idPortfolio']);
        $tabContacts = json_decode($pageContact->getContenu(), false);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        echo "POST";
        
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
                    
                    if ($db->updatePage($pageContact,"Contact", $_SESSION['id_portfolio']))
                    {
                        echo "Contacts mis à jour";
                    }
                    else
                    {
                        echo "Erreur lors de la mise à jour de la page Contacts";
                    }
                }
            }
            else
            {
                echo "Erreur lors de l'ajout du contact";
            }
        }
    }

    /*$tabContacts = array( new Contact("téléphone", "06 06 06 06 06"),
                        new Contact("email", "toto@gmail.com"),
                        new Contact("linkedin", "toto")
                        );*/


    echo $tpl->render( array("tabContacts"=>$tabContacts,"titre"=>$titre) );
}

?>