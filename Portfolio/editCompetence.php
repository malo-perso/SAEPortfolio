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

    $titre = "Édition de la page Competences";

    $titrecentre = "Competences";

    $tpl = $twig->loadTemplate( "templateEditCompetences.tpl" );

    $db = DB::getInstance();
    $competence = $db->getPage($_SESSION['id_utilisateur'],$_GET['id_portfolio'], "Competences");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
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

                    if ($db->updatePage($pageCompetence,"Competences", $_GET['id_portfolio']))
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
            $competence = $db->getPage($_SESSION['id_utilisateur'],$_GET['id_portfolio'], "Competences");
        }


    }

    echo $tpl->render( array( 'titre' => $titre, 'titrecentre' => $titrecentre, 'competence' => $competence ) );
}
?>

