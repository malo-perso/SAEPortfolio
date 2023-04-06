<?php

function getNav($pageEnCours)
{

    $array      = array("accueilSite.php"   ,"Accueil.php" , "CVResume.php", "CVCoordonnees.php"   , "CVFormation.php" , "CVExperience.php", "CVCompetence.php", "CVLangue.php", "Competence.php" , "Projets.php"  , "Contact.php");
    $arrayNom   = array(""                  ,"Accueil"       , "CV"          , "Coordonnées"         , "Formation"       , "Expérience"      , "Compétences"     , "Langues"     , "Compétences"     , "Projets"     , "Contact");

    /* on traverse le tableau et on crée un lien pour chaque page, si la page est la page en cours, on met le li en une autre couleur */

    echo "<div style=\"width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%\">\n";
    echo "<ul class=\"nav nav-tabs flex-column\" style=\"border-style: none;\">\n";

    //le premier lien est une image
    if ($array[0] == $pageEnCours)
    {
        echo "<li class=\"nav-item\"><a class=\"nav-link active\" href=\"../$array[0]\" style=\"color: var(--bs-body-color);background: #c8b79c;border-color: var(--bs-body-bg);margin-bottom:5%;\"><img src=\"../images/logoAcc.png\" alt=\"Logo\" style=\"width: 20%;\"></a></li>\n";
    }
    else
    {
        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../$array[0]\" style=\"color: var(--bs-body-color);margin-bottom:5%;\"><img src=\"../images/logoAcc.png\" alt=\"Logo\" style=\"width: 20%;\"></a></li>\n";
    }


    for ($i = 1; $i < count($array); $i++) 
    {
        if ($i > 2 && $i < 8 )
        {
            if ($array[$i] == $pageEnCours)
            {
                echo "<li class=\"nav-item\"><a class=\"nav-link active\" href=\"./$array[$i]\" style=\"color: var(--bs-body-color);background: #c8b79c;border-color: var(--bs-body-bg); padding-left:15%;\">$arrayNom[$i]</a></li>\n";
            }
            else
            {
                echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"./$array[$i]\" style=\"color: var(--bs-body-color);padding-left:15%;\">$arrayNom[$i]</a></li>\n";
            }
        }
        else
        {
            
            if ($array[$i] == $pageEnCours)
            {
                echo "<li class=\"nav-item\"><a class=\"nav-link active\" href=\"./$array[$i]\" style=\"color: var(--bs-body-color);background: #c8b79c;border-color: var(--bs-body-bg);\">$arrayNom[$i]</a></li>\n";
            }
            else
            {
                echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"./$array[$i]\" style=\"color: var(--bs-body-color);\">$arrayNom[$i]</a></li>\n";
            }
        }
    }

    echo "</ul>\n";
    echo "</div>\n";
}

?>