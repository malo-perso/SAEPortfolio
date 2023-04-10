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

    $titre = "Édition de la page Competences";

    $titrecentre = "Competences";

    $tpl = $twig->loadTemplate( "templateEditCompetences.tpl" );

    $db = DB::getInstance();
    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else 
    {
        $CV = $db->getPage('CV',$_GET['idPortfolio']);
        $contenu = json_decode($CV->getContenu(), false);
        $CV_courant = new CV($contenu);
    }

    $tabCompetences = $CV_courant->__get("competences");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        echo "POST";
        
        if (isset($_POST['contenu']))
        {
            $contenu = $_POST['contenu'];

            $pageCompetence = new Page ($competence->getIdPage(),$competence->getNomPage(), $contenu, $competence->getIdPortfolio());

            if (majCompetence($pageCompetence))
            {
                echo "competence ajouté";
                //mise à jour bd competence

                if ($db == null) {
                    echo "Impossible de se connecter à la base de données !\n";
                }
                else {

                    if ($db->updatePage($pageCompetence,"Competences", $_GET['idPortfolio']))
                    {
                        echo "Competences mis à jour";
                    }
                    else
                    {
                        echo "Erreur lors de la mise à jour de la page Competences";
                    }
                }
            }
            else
            {
                echo "Erreur lors de l'ajout de la page Competences";
            }
        }

        if ($db == null) {
            echo "Impossible de se connecter à la base de données !\n";
        }
        else {
            $pageCompetence = $db->getPage($_SESSION['id_utilisateur'],$_GET['idPortfolio'], "Competences");
        }


    }

    echo $tpl->render( array( 'titre' => $titre, 'titrecentre' => $titrecentre, 'competence' => $competence ) );
}
?>

