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
        echo "Connexion à la base de données réussie !\n";
        $competence = $db->getPage('Competences',$_GET['idPortfolio']);
        $content = $competence->getContenu();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        echo "POST ";
        
        if (isset($_POST['content']))
        {
            
           /* echo "<script>console.log('PHP: ".$content."');</script>";
            
            if ($db == null) {
                echo "Impossible de se connecter à la base de données !\n";
            }
            else {

                if ($db->updatePage($content,"Competences", $_GET['idPortfolio']))
                {
                    echo "Competences mis à jour";
                }
                else
                {
                    echo "Erreur lors de la mise à jour de la page Competences";
                }
            }*/
            
        }
    }

    //$competence = $db->getPage('Competences',$_GET['idPortfolio']);

    echo $tpl->render( array( "content" =>$content, 'titre' => $titre) );
}
?>

