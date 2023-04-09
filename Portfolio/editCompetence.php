<?php

require "../common/DB.inc.php";


require_once( "../Twig/lib/Twig/Autoloader.php" );

Twig_Autoloader::register();
$twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

$titre = "Édition des compétences";

$titrecentre = "Compétences";

$tpl = $twig->loadTemplate( "templateEditCompetences.tpl" );

$db = DB::getInstance();
$CV = $db->getPage($_SESSION['id_utilisateur'],$_SESSION['id_portfolio'], "CV");

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['softSkills']) && isset($_POST['hardSkills']))
    {

        $softSkills = $_POST['softSkills'];
        $hardSkills = $_POST['hardSkills'];

        $competences = new Competences($softSkills, $hardSkills);

        if(ajouterCompetence($competences))
        {
            echo "Compétence ajoutée";
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
            echo "Erreur lors de l'ajout des compétences";
        }
            
    }

    $db = DB::getInstance();

    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else {
        $CV = $db->getPage($_SESSION['id_utilisateur'],$_SESSION['id_portfolio'], "CV");
        
    }
}

$softSkills = $CV->getCompetences()->getSoftSkills();
$hardSkills = $CV->getCompetences()->getHardSkills();


echo $tpl->render( array("softSkills"=>$softSkills,"hardSkills"=>$hardSkills,"titre"=>$titre) );

?>