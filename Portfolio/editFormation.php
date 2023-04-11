<?php
ini_set('display_errors', 1);
require ("../common/DB.inc.php");
include("../common/fctAux.inc.php");

session_start();

/*if(!gestionAcces()) {
    echo "Accès refusé errorrrrrr";
}*/
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
        if ( $contenu['tabExperiences'] != null ) {
            for ($i=0; $i < count($contenu['tabExperiences']); $i++) { 
                $CV_courant->ajouterExperience(new Experience($contenu['tabExperiences'][$i]['intitulePoste'], $contenu['tabExperiences'][$i]['nomEmployeur'], $contenu['tabExperiences'][$i]['villeEmployeur'], $contenu['tabExperiences'][$i]['typeContrat'], $contenu['tabExperiences'][$i]['dateDebutMois'], $contenu['tabExperiences'][$i]['dateDebutAnnee'], $contenu['tabExperiences'][$i]['dateFinMois'], $contenu['tabExperiences'][$i]['dateFinAnnee'], $contenu['tabExperiences'][$i]['mission']));
            }
        }
        if ( $contenu['tabFormations'] != null ) {
            for ($i=0; $i < count($contenu['tabFormations']); $i++) {
                $CV_courant->ajouterFormation(new Formation($contenu['tabFormations'][$i]['nomEtablissement'], $contenu['tabFormations'][$i]['villeEtablissement'], $contenu['tabFormations'][$i]['diplome'], $contenu['tabFormations'][$i]['domaine'], $contenu['tabFormations'][$i]['mention'], $contenu['tabFormations'][$i]['dateDebutMois'], $contenu['tabFormations'][$i]['dateDebutAnnee'], $contenu['tabFormations'][$i]['dateFinMois'], $contenu['tabFormations'][$i]['dateFinAnnee']));
            }
        }
        if ( $contenu['tabLangues'] != null ) {
            for ($i=0; $i < count($contenu['tabLangues']); $i++) { 
                $CV_courant->ajouterLangue(new Langue($contenu['tabLangues'][$i]['nomLangue'], $contenu['tabLangues'][$i]['niveau']));
            }
        }
        if ( $contenu['coordonnees'] != null) {
            $contenu['coordonnees'] = new Coordonnees($contenu['coordonnees']['image'], $contenu['coordonnees']['nom'], $contenu['coordonnees']['prenom'], $contenu['coordonnees']['nomPoste'], $contenu['coordonnees']['adresse'], $contenu['coordonnees']['codePostal'], $contenu['coordonnees']['ville'], $contenu['coordonnees']['telephone'], $contenu['coordonnees']['email'], $contenu['coordonnees']['phraseAccroche']);
        }
        if ( $contenu['competences'] != null) {
            $contenu['competences'] = new Competences($contenu['competences']['idComp'],$contenu['competences']['softSkills'],$contenu['competences']['hardSkills']);
        }
    }
    //$coordonnees = $CV->getCoordonnees();
    $tabFormations = $CV_courant->getTabFormations();

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        echo "POST";
        
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
            
            if($CV_courant->ajouterFormation($formation))
            {
                echo "Formation ajoutée";
                //mise à jour bd CV
                if ($db == null) {
                    echo "Impossible de se connecter à la base de données !\n";
                }
                else {
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
            else
            {
                echo "Erreur lors de l'ajout de la formation";
            }

        }
        else
        {
            echo "Les champns n'ont pas été correctement remplis";
        }
    }
    
    if (isset($_POST['supprimer']))
    {
        echo($_POST['supprimer']);//récupéré la valeur du bouton supprimer
        //supprimer la formation de CV
        //mise à jour bd CV
    }

    echo $tpl->render( array("tabFormations"=>$tabFormations,"titre"=>$titre) );
}
?>