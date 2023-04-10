<?php

require ("../common/DB.inc.php");
require ("../common/contact.inc.php");
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
        $tabContacts = json_decode($pageContact->getContenu(), true);
        if ($tabContacts == null)
        {
            $tabContacts = array();
        }
        else{
            $tabContacts = array_map(function($contact) {
                return new Contact($contact['nomContact'], $contact['descContact']);
            }, $tabContacts);
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nomContact']) && isset($_POST['typeContact']))
    {
        echo "POST";
        //var_dump($_POST);
        echo "tabContacts";
        var_dump($tabContacts);
        if(isset($_POST['nomContact']) && isset($_POST['typeContact']))
        {

            $nomContact = $_POST['nomContact'];
            $type       = $_POST['typeContact'];

            $contact = new Contact($nomContact, $type); 
            //echo 'new Contact : '.$contact->getNomContact().' '.$contact->getTypeContact();
            //echo 'new Contact : '.$_POST['nomContact'].' '.$_POST['typeContact'];


            if(array_push($tabContacts, $contact))
            {
                echo "Contact ajouté au tableau";
                //mise à jour bd CV
            
                if ($db == null) {
                    echo "Impossible de se connecter à la base de données !\n";
                }
                else {
                    $json = json_encode($tabContacts);
                    echo "json : <br>";
                    //var_dump($json);
                    
                    if ($db->updatePage($json,"Contact", $_GET['idPortfolio']))
                    {
                        echo "Contacts mis à jour";
                        unset($_POST['nomContact']);
                        unset($_POST['typeContact']);
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
    echo "POST";
    var_dump($_POST);
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['contact_id'])) {

        //$tableau[0]['nomContact']
        $contact_id = $_POST['contact_id'];
        //$contact->getIdContact();
        
        $contact_key = array_search($contact_id, array_column($tabContacts, 'idContact'));
        echo "contact_key : ".$contact_key ."a spp<br>";

        $tabContacts = array_filter($tabContacts, function($contact) use ($contact_id) {
            return $contact->getIdContact() != $contact_id;
        });
        
        if ($db == null) {
            echo "Impossible de se connecter à la base de données !\n";
        }
        else {
            $json = json_encode($tabContacts);
            
            if ($db->updatePage($json,"Contact", $_GET['idPortfolio']))
            {
                echo "Contacts mis à jour";
                unset($_POST['nomContact'], $_POST['typeContact']);
            }
            else
            {
                echo "Erreur lors de la mise à jour de la page Contacts";
            }
        }
    }
    //var_dump($tabContacts);
    echo $tpl->render( array("tabContacts"=>$tabContacts,"titre"=>$titre) );
}

?>