<?php

include "../common/CV/formation.inc.php";
//include "../common/DB.inc.php";


require_once( "../Twig/lib/Twig/Autoloader.php" );

Twig_Autoloader::register();
$twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

$titre = "Édition des formations";

$titrecentre = "Formations";

$tpl = $twig->loadTemplate( "templateEditFormations.tpl" );

$tabFormations = array( new Formation(0, "Ecole de la Paix", "Paris", "Licence", "Droit", "09/2010", "06/2013"),
                        new Formation(1, "Iut du Havre", "Le Havre", "BUT", "Informatique", "09/2010", "06/2013"),
                        new Formation(2, "Ecole de la Paix", "Paris", "Licence", "Droit", "09/2010", "06/2013")
                      );

//$tabformations = $db->getFormations($user.getIdUser());

//si dans la méthode post = nom du formulaire alors 
    //update de la formation dans la DB
    // recharger la page

if ($_SERVER["RESQUEST_METHOD"] == "POST")
{
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

        
    }
}

//getformation in db

echo $tpl->render( array("tabFormations"=>$tabFormations,"titre"=>$titre) );
?>