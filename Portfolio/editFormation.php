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

    $titre = "Édition des formations";

    $titrecentre = "Formations";

    $tpl = $twig->loadTemplate( "templateEditFormations.tpl" );

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
    //$coordonnees = $CV->getCoordonnees();
    $tabFormations = $CV_courant->__get("formations");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        echo "POST";
        
        if(isset($_POST['nomEtat']) && isset($_POST['ville']) && isset($_POST['diplome']) && isset($_POST['domaine']) && isset($_POST['mention']) && isset($_POST['moisDeb']) && isset($_POST['anneeDeb']) && isset($_POST['moisFin']) && isset($_POST['anneeFin']))
        {
            $nometat = $_POST['nomEtat'];
            $ville  = $_POST['ville'];
            $diplome = $_POST['diplome'];
            $domaine = $_POST['domaine'];
            $mention = $_POST['mention'];
            $moisDeb = $_POST['moisDeb'];
            $anneeDeb = $_POST['anneeDeb'];
            $moisFin = $_POST['moisFin'];
            $anneeFin = $_POST['anneeFin'];

            //$formation = new Formation($nometat, $ville, $diplome, $domaine, $mention, $moisDeb."-".$anneeDeb, $moisFin."-".$anneeFin);

            echo "Formation : ".$formation->getNomEtat()." ".$formation->getVille()." ".$formation->getDiplome()." ".$formation->getDomaine()." ".$formation->getMention()." ".$formation->getMoisDeb()." ".$formation->getAnneeDeb()." ".$formation->getMoisFin()." ".$formation->getAnneeFin();

            
            if(ajouterFormation($formation))
            {
                echo "Formation ajoutée";
                //mise à jour bd CV
                $db = DB::getInstance();
                if ($db == null) {
                    echo "Impossible de se connecter à la base de données !\n";
                }
                else {
                    if ($db->updatePage(null,"CV", $_GET['idPortfolio']))
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
                echo "Erreur lors de l'ajout de la formation";
            }

        }
    }
    
    if (isset($_POST['supprimer']))
    {
        echo($_POST['supprimer']);//récupéré la valeur du bouton supprimer
        //supprimer la formation de CV
        //mise à jour bd CV
    }

    /*
    $tabFormations = array( new Formation("Ecole de la Paix", "Paris", "Licence", "Droit", "09/2010", "06/2013"),
                            new Formation("Iut du Havre", "Le Havre", "BUT", "Informatique", "09/2010", "06/2013"),
                            new Formation("Ecole de la Paix", "Paris", "Licence", "Droit", "09/2010", "06/2013")
                          );

    */
    echo $tpl->render( array("tabFormations"=>$tabFormations,"titre"=>$titre) );
}
?>