function getNav(pageEnCours, typePage, para) 
{
    console.log("pageEnCours: " + pageEnCours);
    var arrayNom = ["", "Accueil", "CV", "Coordonnées", "Formation", "Expérience", "Compétences", "Langues", "Compétences", "Projets", "Contact"];

    if (typePage == "edit") {
        var array = ["accueilSite.php", "editAccueil.php", "CVResume.php", "editCoordonnee.php", "editFormation.php", "editExperience.php", "editCVCompetence.php", "editLangue.php", "editCompetence.php", "editProjets.php", "editContact.php"];
    }
    else if (typePage == "consult") {
        var array = ["accueilSite.php", "consultAccueil.php", "consultCV.php", "consultCompetence.php", "consultProjet.php", "droit.php", "consultContact.php"];
        var arrayNom = ["", "Accueil", "CV", "Compétences", "Projets","Propriété intellectuelle", "Contact"];
    }
    
    

    let navHtml = "\n" +
                    "<ul class=\"nav nav-tabs flex-column\" style=\"border-style: none;\">";

    if (array[0] === pageEnCours) 
    {
        navHtml += "<li class=\"nav-item\"><a class=\"nav-link active\" href=\"../ " + array[0] + para + "\" style=\"color: var(--bs-body-color);background: #c8b79c;border-color: var(--bs-body-bg);margin-bottom:5%;\"><img src=\"../images/logoAcc.png\" alt=\"Logo\" style=\"width: 20%;\"></a></li>";
    } else {
        navHtml += "<li class=\"nav-item\"><a class=\"nav-link\" href=\"../" + array[0] + para +"\" style=\"color: var(--bs-body-color);margin-bottom:5%;\"><img src=\"../images/logoAcc.png\" alt=\"Logo\" style=\"width: 20%;\"></a></li>";
    }

    for (let i = 1; i < array.length; i++) 
    {
        if (i > 2 && i < 8 && typePage == "edit") 
        {
            if (array[i] === pageEnCours) 
            {
                navHtml += "<li class=\"nav-item\"><a class=\"nav-link active\" href=\"./" + array[i] + para + "\" style=\"color: var(--bs-body-color);background: #c8b79c;border-color: var(--bs-body-bg);padding-left:15%;\">" + arrayNom[i] + "</a></li>";
            } else {
                navHtml += "<li class=\"nav-item\"><a class=\"nav-link\" href=\"./" + array[i] + para + "\" style=\"color: var(--bs-body-color);padding-left:15%;\">" + arrayNom[i] + "</a></li>";
            }
        } else {
            if (array[i] === pageEnCours) {
                navHtml += "<li class=\"nav-item\"><a class=\"nav-link active\" href=\"./" + array[i] + para +"\" style=\"color: var(--bs-body-color);background: #c8b79c;border-color: var(--bs-body-bg);\">" +arrayNom[i]+ "</a></li>";
            } else {
                navHtml += "<li class=\"nav-item\"><a class=\"nav-link\" href=\"./" + array[i] + para +"\" style=\"color: var(--bs-body-color);\"> " + arrayNom[i] + " </a></li>";
            }
        }
    }

    navHtml += "</ul>";

    return navHtml;
}
