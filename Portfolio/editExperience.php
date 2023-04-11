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

    $titre = "Édition des expériences";

    $titrecentre = "Expériences";

    $tpl = $twig->loadTemplate( "templateEditExperiences.tpl" );

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

        $tabExperiences = $CV_courant->getTabExperiences();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if(isset($_POST['intitulePoste']) && isset($_POST['ville']) && isset($_POST['employeur']) && isset($_POST['contrat']) && isset($_POST['moisDeb']) && isset($_POST['anneeDeb']) && isset($_POST['moisFin']) && isset($_POST['anneeFin']) && isset($_POST['description']))
        {
            $intitulePoste = $_POST['intitulePoste'];
            $ville = $_POST['ville'];
            $employeur = $_POST['employeur'];
            $contrat = $_POST['contrat'];
            $moisDeb = $_POST['moisDeb'];
            $anneeDeb = $_POST['anneeDeb'];
            $moisFin = $_POST['moisFin'];
            $anneeFin = $_POST['anneeFin'];
            $description = $_POST['description'];

            $experience = new Experience($intitulePoste, $employeur, $ville, $contrat, $moisDeb, $anneeDeb, $moisFin, $anneeFin, $description);

            $CV_courant->ajouterExperience($experience);
            
                echo "Expérience ajoutée";
                //mise à jour bd CV
               
                $json = json_encode($CV_courant);

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

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['supprimer']))
    {
        echo($_POST['supprimer']);//récupéré la valeur du bouton supprimer
        //supprimer la formation de CV
        //mise à jour bd CV
    }

    $tabExperiences = $CV_courant->getTabExperiences();

    echo $tpl->render( array("tabExperiences"=>$tabExperiences,"titre"=>$titre) );
}
?>