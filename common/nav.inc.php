<?php

function getNav()
{
    echo "<div style=\"width: 155px;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 900px;padding-top: 0px;margin-top: 0px;\">\n";
    echo "<ul class=\"nav nav-tabs flex-column\" style=\"border-style: none;\">\n";
    echo "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../accueil.php\" style=\"color: var(--bs-body-color);\">Page accueil</a></li>\n";
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
    echo "</div>\n";
}

?>