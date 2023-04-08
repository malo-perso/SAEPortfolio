// fonctions supprimer

function supprimerFormation(idFormation)
{
    var formations = document.getElementById("formations");
    formations.removeChild("formations-"+ idFormation );
}

function supprimerLangue(idLangue)
{
    var langues = document.getElementById("langues");
    langues.removeChild("langues-"+ idLangue );
}