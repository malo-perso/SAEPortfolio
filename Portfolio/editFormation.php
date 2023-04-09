<?php

include "../common/CV/CV.inc.php";

session_start();

if(! isset($_SESSION['id_utilisateur'])) {
    header('Location: ..\connexion.php');
}
else {

    require_once( "../Twig/lib/Twig/Autoloader.php" );

    Twig_Autoloader::register();
    $twig = new Twig_Environment( new Twig_Loader_Filesystem("../tpl"));

    $titre = "Édition des formations";

    $titrecentre = "Formations";

    $tpl = $twig->loadTemplate( "templateEditFormations.tpl" );


    if ($_SERVER["RESQUEST_METHOD"] == "POST")
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

            $formation = new Formation($nometat, $ville, $diplome, $domaine, $mention, $moisDeb."-".$anneeDeb, $moisFin."-".$anneeFin);

            echo "Formation : ".$formation->getNomEtat()." ".$formation->getVille()." ".$formation->getDiplome()." ".$formation->getDomaine()." ".$formation->getMention()." ".$formation->getMoisDeb()." ".$formation->getAnneeDeb()." ".$formation->getMoisFin()." ".$formation->getAnneeFin();

            ajouterFormation($formation);        
        }
    }

    if ($_SERVER["RESQUEST_METHOD"] == "POST" && isset($_POST['supprimer']))
    {
        echo($_POST['supprimer']);
    }

    //$tabFormations = $db->getFormations($user.getIdUser());

    //si dans la méthode post = nom du formulaire alors 
        //update de la formation dans la DB
        // recharger la page

    $tabFormations = array( new Formation("Ecole de la Paix", "Paris", "Licence", "Droit", "09/2010", "06/2013"),
                            new Formation("Iut du Havre", "Le Havre", "BUT", "Informatique", "09/2010", "06/2013"),
                            new Formation("Ecole de la Paix", "Paris", "Licence", "Droit", "09/2010", "06/2013")
                          );

    echo $tpl->render( array("tabFormations"=>$tabFormations,"titre"=>$titre) );
}
?>