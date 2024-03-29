{% extends "templateBase.tpl" %}

{% block contenu %}

<div id="nav" style="width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%"> </div>

<script>
    window.addEventListener('DOMContentLoaded', function() 
    {
        var result = getNav("consultCompetence.php", "consult");
        var id = document.getElementById("nav");
        id.innerHTML = result;
    });
</script>

<div style="margin-left:15%; width:85%;">

    <h1 class="text-center" style="padding-top: 5%;">Page de Compétences</h1>

    <div class="col-lg-12" style="margin-bottom: 40px;">
        <label class="form-label form-label">Soft skills</label>
        {% for competence in softSkills %}
            <div style="display:flex; justify-content:center;">
                <p class="text-center" style="width:35%; border: 1px solid var(--color-blue);border-radius:3%; justify-content: center;margin:3%;"> {{ competence.getNomComp() }} </p>
            </div>
        {% endfor %}
    </div>

    <div class="col-lg-12" style="margin-bottom: 40px;">
        <label class="form-label form-label">Soft skills</label>
        {% for competence in hardSkills %}
            <div style="display:flex; justify-content:center;">
                <p class="text-center" style="width:35%; border: 1px solid var(--color-blue);border-radius:3%; justify-content: center;margin:3%;"> {{ competence.getNomComp() }} </p>
            </div>
        {% endfor %}
    </div>
</div>

{% endblock %}