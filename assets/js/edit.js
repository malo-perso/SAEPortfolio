

function ajouterFormation() {

    var nomEtablissement = document.getElementById("nomEtablissement").value;
    var villeEtablissement = document.getElementById("villeEtablissement").value;
    var diplome = document.getElementById("diplome").value;
    var domaine = document.getElementById("domaine").value;
    var dateDebut = document.getElementById("moisDeb").value + "-" + document.getElementById("anneeDeb").value;
    var dateFin = document.getElementById("moisFin").value + "-" + document.getElementById("anneeFin").value;

    var formations = document.getElementById("formations");

    if (nomEtablissement == "" || villeEtablissement == "" || diplome == "" || domaine == "" || dateDebut == "" || dateFin == ""){
        window.alert("Veuillez remplir correctement tous les champs");
    }
    else {
        formations.innerHTML += "<section style=\"margin: 0px 10px 10px 10px;margin-top: 34px;border-style: solid;border-color: var(--color-brown);width: 500px;padding: 22px 10px 10px 10px;margin-bottom: 14px;margin-right: 23px;padding-left: 51px;margin-left: 164px;\"> \n" +
                                "<p class=\"index_nom_ville\">" + nomEtablissement + " " + villeEtablissement + "</p> \n" +
                                "<p class=\"diplome_domaine_dates\">" + diplome + "-" + domaine + " " + dateDebut + " " + dateFin + "</p> \n" +
                                "</section> \n";
    }
}

function ajouterLangue() {
    // TODO
}