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

    $titre = "Édition de la page Compétences";

    $titrecentre = "Compétences";

    $tpl = $twig->loadTemplate( "templateEditCompetences.tpl" );

    $db = DB::getInstance();
    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else 
    {
        $comp = $db->getPage("Competences", $_GET['idPortfolio']);
        if($comp != null)
            $contenu = json_decode($comp->getContenu(), true);
        else
            $contenu = "";
        
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (isset($_POST['competence']))
        {
            $contenu = $_POST['competence'];

            //mise à jour bd Accueil
            $json = json_encode($contenu);

            if ($db->updatePage($json,"Competences", $_GET['idPortfolio']))
            {
                echo "Projets mis à jour";
            }
            else
            {
                echo "Erreur lors de la mise à jour de la page Projets";
            }
        }
    }


    echo $tpl->render( array( 'titre' => $titre, 'titrecentre' => $titrecentre, 'competence' => $contenu ) );
}
?>

