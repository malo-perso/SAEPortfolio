<?php

function getNav($pageEnCours)
{

    $array      = array("accueilSite.php"   ,"Accueil.php" , "CVResume.php", "CVCoordonnees.php"   , "CVFormation.php" , "CVExperience.php", "CVCompetence.php", "CVLangue.php", "Competence.php" , "Projets.php"  , "Contact.php");
    $arrayNom   = array(""                  ,"Accueil"       , "CV"          , "Coordonnées"         , "Formation"       , "Expérience"      , "Compétences"     , "Langues"     , "Compétences"     , "Projets"     , "Contact");

    /* on traverse le tableau et on crée un lien pour chaque page, si la page est la page en cours, on met le li en une autre couleur */

    echo "<div style=\"width: 155px;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 900px;padding-top: 0px;margin-top: 0px;\">\n";
    echo "<ul class=\"nav nav-tabs flex-column\" style=\"border-style: none;\">\n";

    //le premier lien est une image
    if ($array[0] == $pageEnCours)
    {
        echo "<li class=\"nav-item\"><a class=\"nav-link active\" href=\"../$array[0]\" style=\"color: var(--bs-body-color);background: #c8b79c;border-color: var(--bs-body-bg);border-left: px solid var(--color-blue);\"><img src=\"../images/logoAcc.png\" alt=\"Logo\" style=\"width: 50px;\"></a></li>\n";
    }
    else
    {
        echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../$array[0]\" style=\"color: var(--bs-body-color);\"><img src=\"../images/logoAcc.png\" alt=\"Logo\" style=\"width: 50px;\"></a></li>\n";
    }


    for ($i = 1; $i < count($array); $i++) 
    {
        if ($i > 2 && $i < 8 )
        {
            if ($array[$i] == $pageEnCours)
            {
                echo "<li class=\"nav-item\"><a class=\"nav-link active\" href=\"./$array[$i]\" style=\"color: var(--bs-body-color);background: #c8b79c;border-color: var(--bs-body-bg);border-left: px solid var(--color-blue); padding-left:35px;\">$arrayNom[$i]</a></li>\n";
            }
            else
            {
                echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"./$array[$i]\" style=\"color: var(--bs-body-color);padding-left:35px;\">$arrayNom[$i]</a></li>\n";
            }
        }
        else
        {
            
            if ($array[$i] == $pageEnCours)
            {
                echo "<li class=\"nav-item\"><a class=\"nav-link active\" href=\"./$array[$i]\" style=\"color: var(--bs-body-color);background: #c8b79c;border-color: var(--bs-body-bg);border-left: px solid var(--color-blue);\">$arrayNom[$i]</a></li>\n";
            }
            else
            {
                echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"./$array[$i]\" style=\"color: var(--bs-body-color);\">$arrayNom[$i]</a></li>\n";
            }
        }
    }

    echo "</ul>\n";
    echo "</div>\n";
    
    /*echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../accueil.php\" style=\"color: var(--bs-body-color);\">Page accueil</a></li>\n";
    echo "<li class=\"nav-item\"><a class=\"nav-link active\" href=\"../CV/CVResume.php\" style=\"color: var(--bs-body-color);background: #c8b79c;border-color: var(--bs-body-bg);border-left: px solid var(--color-blue);\">CV</a>\n";
    echo "<ul class=\"nav nav-tabs\" style=\"border-style: none;\">\n";
    echo "<li class=\"nav-item\"><a class=\"nav-link active\" href=\"../CV/CVCoordonnees.php\" style=\"border-style: none;color: var(--bs-body-color);width: 150px;background: #e7e4df;\">Coordonnées</a></li>\n";
    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../CV/CVFormation.php\" style=\"color: var(--bs-body-color);width: 150px;background: #c8b79c;\">Formations</a></li>\n";
    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../CV/CVExperience.php\" style=\"color: var(--bs-body-color);background: #e7e4df;width: 150px;\">Expériences</a></li>\n";
    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../CV/CVCompetence.php\" style=\"color: var(--bs-body-color);width: 150px;\">Compétences</a></li>\n";
    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../CV/CVLangue.php\" style=\"color: var(--bs-body-color);width: 150px;\">Langues</a></li>\n";
    echo "</ul>\n";
    echo "</li>\n";
    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"#\" style=\"border-style: none;color: var(--bs-body-color);\">Compétences</a></li>\n";
    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"#\" style=\"color: var(--bs-body-color);\">Projets</a></li>\n";
    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"#\" style=\"border-style: solid;color: var(--bs-body-color);\">Contacts</a></li>\n";
    echo "</ul>\n";
    echo "</div>\n";*/
}

?>