<?php
ini_set('display_errors', 1);
require ("../common/DB.inc.php");
include("../common/fctAux.inc.php");

session_start();

if(!gestionAcces()) {
    echo "Accès refusé errorrrrrr";
}
else{

    require_once( "../Twig/lib/Twig/Autoloader.php" );

    Twig_Autoloader::register();
    $twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

    $titre = "Édition des compétences";

    $titrecentre = "Compétences";

    $tpl = $twig->loadTemplate( "templateEditCVCompetences.tpl" );

     $db = DB::getInstance();
    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else 
    {
        $CV = $db->getPage('CV',$_GET['idPortfolio']);
        
        $contenu = json_decode($CV->getContenu(), true);
        $CV_courant = new CV();
        $CV_courant->tabToCV($contenu);

        $competences = $CV_courant->getCompetences();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['softSkills']) && isset($_POST['hardSkills']))
        {

            $softSkills = $_POST['softSkills'];
            $hardSkills = $_POST['hardSkills'];
            
            var_dump($softSkills);
            var_dump($hardSkills);

            $competences = new Competences($softSkills, $hardSkills);

            $CV_courant->majCompetence($competences);
            
            echo "Compétence ajoutée";
            //mise à jour bd CV

            $json = json_encode($CV_courant);

            echo "<script>console.log('PHP: ".$json."');</script>";
        
            
            if ($db->updatePage($json,"CV", $_GET['idPortfolio']))
            {
                echo "CV mis à jour";
                unset($_POST);
            }
            else
            {
                echo "Erreur lors de la mise à jour du CV";
            }
            
                
        }
    }

    $softSkills = $competences->getSoftSkills();
    $hardSkills = $competences->getHardSkills();

    echo $tpl->render( array("softSkills"=>$softSkills,"hardSkills"=>$hardSkills,"titre"=>$titre) );
}
?>