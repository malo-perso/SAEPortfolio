<?php

include "../common/CV/competence.inc.php";
include "../common/CV/CV.inc.php";
require "../common/DB.inc.php";


require_once( "../Twig/lib/Twig/Autoloader.php" );

Twig_Autoloader::register();
$twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

$titre = "Édition des compétences";

$titrecentre = "Compétences";

$tpl = $twig->loadTemplate( "templateEditCompetences.tpl" );

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(isset($_POST['softSkills']) && isset($_POST['hardSkills']))
    {

        $softSkills = $_POST['softSkills'];
        $hardSkills = $_POST['hardSkills'];
        $competences = array();
        
        for ($i = 0; $i < count($softSkills); $i++)
        {
            $competences[$i] = new Competence($softSkills[$i]);
        }

        for ($i = count($softSkills); $i < count($softSkills) + count($hardSkills); $i++)
        {
            $competences[$i] = new Competence($hardSkills[$i - count($softSkills)]);
        }

        if(ajouterCompetence($competences))
        {
            echo "Formation ajoutée";
            //mise à jour bd CV
            $db = DB::getInstance();
            if ($db == null) {
                echo "Impossible de se connecter à la base de données !\n";
            }
            else {
                $CV = $db->getPage($_SESSION['id_utilisateur'],$_SESSION['id_portfolio'], "CV");
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

    $db:: DB::getInstance();
}

/*$softSkills = array( new Competence("Anglais"),
                     new Competence("Espagnol"),
                     new Competence("Allemand")
                   );

$hardSkills = array( new Competence("Java"),
                     new Competence("C++"),
                     new Competence("C#")
                   );*/


echo $tpl->render( array("softSkills"=>$softSkills,"hardSkills"=>$hardSkills,"titre"=>$titre) );
?>