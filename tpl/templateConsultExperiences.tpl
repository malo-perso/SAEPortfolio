{% extends "templateBase.tpl" %}

{% block contenu %}

<div id="nav" style="width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%";  margin-top:55px;> </div>

<script>
    window.addEventListener('DOMContentLoaded', function() 
    {
        var para = window.location.search;
        var result = getNav("consultCompetence.php", "consult",para);
        var id = document.getElementById("nav");
        id.innerHTML = result;
    });
</script>

<section class="text-start" style="text-align: left;padding-top: 60px;padding-left: 186px;padding-right: 30px;">
        <h2 class="text-start d-xxl-flex align-items-center" style="color: var(--bs-body-color);margin-top: 0px;padding-top: 0px;padding-left: 0px;width: 253px;margin-left: 160px;">Expériences</h2>
        {% for exp in tabExperiences %}
            <section style="margin: 0px 10px 10px 10px;margin-top: 34px;border-style: solid;border-color: var(--color-brown);width: 500px;padding: 22px 10px 10px 10px;margin-bottom: 14px;margin-right: 23px;padding-left: 51px;margin-left: 164px;">
                <p class="index_nom_ville"> {{ exp.getIdExperience() }} :&nbsp;{{ exp.getIntitulePoste() }} -&nbsp;{{ exp.getNomEmployeur() }} ,&nbsp;{{ exp.getVilleEmployeur() }} </p>
                <p class="diplome_domaine_dates"> {{ exp.getTypeContrat() }} ;&nbsp;{{ exp.getDateDebut() }} |&nbsp;{{ exp.getDateFin() }} </p>
            </section>
        {% endfor %}
    </section>
    <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" style="margin-left: 189px;border-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);margin-top: 45px;"><a href="CVFormation.php" style="color: var(--color-brown)">Précédent (formations)</a></button>
    <button class="btn btn-primary float-end" data-bss-hover-animate="pulse" type="button" style="margin-top: 40px;margin-right: 27px;background: rgba(255,255,255,0.5);color: var(--color-brown);border-style: solid;border-color: var(--color-brown);"><a href="CVCompetence.php" style="color: var(--color-brown)">Suivant (compétences)</a></button>

{% endblock %}