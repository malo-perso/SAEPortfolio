

function ajouterFormation() {

    var nomEtablissement = document.getElementById("nomEtablissement").value;
    var villeEtablissement = document.getElementById("villeEtablissement").value;
    var diplome = document.getElementById("diplome").value;
    var domaine = document.getElementById("domaine").value;
    var dateDebut = document.getElementById("moisDeb").value + "-" + document.getElementById("anneeDeb").value;
    var dateFin = document.getElementById("moisFin").value + "-" + document.getElementById("anneeFin").value;

    var formations = document.getElementById("formations");

    ajouterFormation(formation, $CV);
     
}

function supprimerFormation(idFormation)
{   
    var formations = document.getElementById("formations");
    formations.removeChild("formations-"+ idFormation );
}

function ajouterLangue() {

    var langue = document.getElementById("langue").value;
    var niveau = document.getElementById("niveau").value;

    var langues = document.getElementById("langues");

    if (langue == "" || niveau == ""){
        window.alert("Veuillez remplir correctement tous les champs");
    }
    else {
        console.log(langue);
        console.log(niveau);
    }

    
}