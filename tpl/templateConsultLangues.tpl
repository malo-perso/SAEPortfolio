{% extends "templateBase.tpl" %}

{%block contenu %}

<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
<link rel="stylesheet" href="../assets/css/animate.min.css">
<link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/Form-Select---Full-Date---Month-Day-Year.css">
<link rel="stylesheet" href="../assets/css/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.css">
<link rel="stylesheet" href="../assets/css/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1.css">
<link rel="stylesheet" href="../assets/css/Profile-Edit-Form-styles.css">
<link rel="stylesheet" href="../assets/css/Profile-Edit-Form.css">
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/bs-init.js"></script>
<script src="../assets/js/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.js"></script>
<script src="../assets/js/Profile-Edit-Form-profile.js"></script>
<script src="../assets/js/getNav.js"></script>

<div id="nav" style="width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%"> </div>

<script>
    window.addEventListener('DOMContentLoaded', function() 
    {
        var result = getNav("CVCompetence.php");
        var id = document.getElementById("nav");
        id.innerHTML = result;
    });
</script>

<div style="border-color: var(--color-brown);">

    <div style="margin-left:15%; width:85%;">

        <h1 class="text-center" style="padding-top: 5%;">Page de Contacts</h1>

        {% for langue in tabLangues %}
            <div style="display:flex; justify-content:center;">
                <p class="text-center" style="width:35%; border: 1px solid var(--color-blue);border-radius:3%; justify-content: center;margin:3%;"> {{ langue.getNomLangue() }} -&nbsp;{{ langue.getNiveauLangue() }} </p>
            </div>
        {% endfor %}
    </div>
    <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" style="margin-left: 189px;border-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);margin-top: 45px;"><a href="CVCompetence.php" style="color: var(--color-brown)">Précédent (compétences)</a></button>
    <button class="btn btn-primary float-end" data-bss-hover-animate="pulse" type="button" style="border-style: solid;border-color: var(--color-brown);background: var(--color-brown);color: var(--bs-body-bg);margin-top: 45px;margin-left: 0px;margin-right: 21px;">Enregistrer</button>

    <script src="../assets/js/edit.js"></script>
    <script>
        window.addEventListener("load", function () {
            this.document.getElementById("btnAjoutLangue").addEventListener("click", ajouterLangue);
        });
    </script>
</div>

{% endblock %}