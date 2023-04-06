{% extends "templateBase.tpl" %}

{%block contenu %}

<div class="text-start">
        <div style="width: 155px;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 900px;padding-top: 0px;margin-top: 0px;">
            <ul class="nav nav-tabs flex-column" style="border-style: none;">
                <li class="nav-item"><a class="nav-link" href="#" style="color: var(--bs-body-color);">Page accueil</a></li>
                <li class="nav-item"><a class="nav-link active" href="#" style="color: var(--bs-body-color);background: #c8b79c;border-color: var(--bs-body-bg);border-left: px solid var(--color-blue);">CV</a>
                    <ul class="nav nav-tabs" style="border-style: none;">
                        <li class="nav-item"><a class="nav-link active" href="#" style="border-style: none;color: var(--bs-body-color);width: 150px;background: #e7e4df;">Coordonées</a></li>
                        <li class="nav-item"><a class="nav-link" href="#" style="color: var(--bs-body-color);width: 150px;background: #c8b79c;">Formations</a></li>
                        <li class="nav-item"><a class="nav-link" href="#" style="color: var(--bs-body-color);background: #e7e4df;width: 150px;">Expériences</a></li>
                        <li class="nav-item"><a class="nav-link" href="#" style="color: var(--bs-body-color);width: 150px;">Compétences</a></li>
                        <li class="nav-item"><a class="nav-link" href="#" style="color: var(--bs-body-color);width: 150px;">Langues</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#" style="border-style: none;color: var(--bs-body-color);">Compétences</a></li>
                <li class="nav-item"><a class="nav-link" href="#" style="color: var(--bs-body-color);">Projets</a></li>
                <li class="nav-item"><a class="nav-link" href="#" style="border-style: solid;color: var(--bs-body-color);">Contacts</a></li>
            </ul>
        </div>
        <section class="text-start" style="text-align: left;padding-top: 60px;padding-left: 186px;padding-right: 30px;">
            <h2 class="text-start d-xxl-flex align-items-center" style="color: var(--bs-body-color);margin-top: 0px;padding-top: 0px;padding-left: 0px;width: 253px;margin-left: 160px;">Formations</h2>
            <div id="formations">
                {% for formation in tabFormations %}
                    <section style="margin: 0px 10px 10px 10px;margin-top: 34px;border-style: solid;border-color: var(--color-brown);width: 500px;padding: 22px 10px 10px 10px;margin-bottom: 14px;margin-right: 23px;padding-left: 51px;margin-left: 164px;">
                        <p class="index_nom_ville">{{ formation.getNomEtablissement() }} -&nbsp;{{ formation.getVilleEtablissement() }}</p>
                        <p class="diplome_domaine_dates">{{ formation.getDiplome() }} -&nbsp;{{ formation.getDomaine() }} -&nbsp;{{ formation.getDateDebut() }} |&nbsp;{{ formation.getDateFin() }}</p>
                    </section>
                {% endfor %}
            </div>
        </section>
    </div>

    <script src="../assets/js/edit.js"></script>
    <script>
        window.addEventListener("load", function () {
            this.document.getElementById("btnAjoutFormation").addEventListener("click", ajouterFormation);
        });
    </script>

    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.js"></script>
    <script src="../assets/js/Profile-Edit-Form-profile.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.css">
    <link rel="stylesheet" href="../assets/css/Profile-Edit-Form-styles.css">
    <link rel="stylesheet" href="../assets/css/Profile-Edit-Form.css">

{% endblock %}