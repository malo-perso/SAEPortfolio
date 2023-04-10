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

    $titre = "Édition de la page Accueil";

    $titrecentre = "Accueil";

    $tpl = $twig->loadTemplate( "templateEditAccueil.tpl" );

    $db = DB::getInstance();
    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else 
    {
        $Accueil = $db->getPage('Accueil',$_GET['idPortfolio']);
        //$contenu = json_decode($Accueil->getContenu(), false);
        if($Accueil==null){
            $contenu = " ";
        }
        else{
            $contenu = json_decode($Accueil->getContenu(), false);
        }
    }


    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (isset($_POST['contenu']))
        {
            $contenu = $_POST['contenu'];

            $pageAccueil = new Page ($accueil->getIdPage(),$accueil->getNomPage(), $contenu, $accueil->getIdPortfolio());

            if (majAccueil($pageAccueil))
            {
                echo "Accueil ajouté";
                //mise à jour bd Accueil

                if ($db == null) {
                    echo "Impossible de se connecter à la base de données !\n";
                }
                else {

                    if ($db->updatePage($pageAccueil,"Accueil", $_GET['id_portfolio']))
                    {
                        echo "Accueil mis à jour";
                    }
                    else
                    {
                        echo "Erreur lors de la mise à jour de l'accueil";
                    }
                }
            }
            else
            {
                echo "Erreur lors de l'ajout de l'accueil";
            }
        }

    }
    echo $tpl->render( array( 'titre' => $titre, 'titrecentre' => $titrecentre, 'accueil' => $contenu) );
}
?>

