<?php
ini_set('display_errors', 1);
require ("../common/DB.inc.php");
include("../common/fctAux.inc.php");

session_start();

if(!gestionAcces()) {
    echo "Accès refusé errorrrrrr";
}
if(true){

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
        $contenu = json_decode($CV->getContenu(), true);
        $CV_courant = new CV();
        $CV_courant->tabToCV($contenu);

        $tabFormations = $CV_courant->getTabFormations();
    }

    

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {        
        if(isset($_POST['etablissement']) && isset($_POST['ville']) && isset($_POST['diplome']) && isset($_POST['domaine']) && isset($_POST['mention']) && isset($_POST['moisDeb']) && isset($_POST['anneeDeb']) && isset($_POST['moisFin']) && isset($_POST['anneeFin']))
        {
            $nometat = $_POST['etablissement'];
            $ville  = $_POST['ville'];
            $diplome = $_POST['diplome'];
            $domaine = $_POST['domaine'];
            $mention = $_POST['mention'];
            $moisDeb = $_POST['moisDeb'];
            $anneeDeb = $_POST['anneeDeb'];
            $moisFin = $_POST['moisFin'];
            $anneeFin = $_POST['anneeFin'];

            $formation = new Formation($nometat, $ville, $diplome, $domaine, $mention, $moisDeb."-".$anneeDeb, $moisFin."-".$anneeFin);
            
            $CV_courant->ajouterFormation($formation);
            
            echo "Formation ajoutée";
            
            $json = json_encode($CV_courant);

            if ($db->updatePage($json,"CV", $_GET['idPortfolio']))
            {
                echo "CV mis à jour";
                unset($_POST['etablissement'], $_POST['ville'], $_POST['diplome'], $_POST['domaine'], $_POST['mention'], $_POST['moisDeb'], $_POST['anneeDeb'], $_POST['moisFin'], $_POST['anneeFin']);
            }
            else
            {
                echo "Erreur lors de la mise à jour du CV";
            }

        }
        else
        {
            echo "Les champs n'ont pas été correctement remplis";
        }
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['formation_id'])) {

        $formation_id = $_POST['formation_id'];

        $formation_key = array_search($formation_id, array_column($tabFormations, 'idFormation'));
        echo "formation_key : ".$formation_key." a supp<br>";

        $CV_courant->supprimerFormation($formation_key);
        
        if ($db == null) {
            echo "Impossible de se connecter à la base de données !\n";
        }
        else {
            $json = json_encode($CV_courant);
            
            if ($db->updatePage($json,"CV", $_GET['idPortfolio']))
            {
                echo "Formations mis à jour";
                unset($_POST['formation_id']);
            }
            else
            {
                echo "Erreur lors de la mise à jour de la page Formations";
            }
        }
    }

    $tabFormations = $CV_courant->getTabFormations();

    echo $tpl->render( array("tabFormations"=>$tabFormations,"titre"=>$titre) );
}
?>