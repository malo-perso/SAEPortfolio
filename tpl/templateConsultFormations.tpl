{% extends "templateBase.tpl" %}

{%block contenu %}

<div id="nav" style="width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%"> </div>

<script>
    window.addEventListener('DOMContentLoaded', function() 
    {
        var result = getNav("consultCompetence.php", "consult");
        var id = document.getElementById("nav");
        id.innerHTML = result;
    });
</script>

<div class="text-start">
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

{% endblock %}