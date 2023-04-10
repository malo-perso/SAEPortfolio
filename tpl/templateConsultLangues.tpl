{% extends "templateBase.tpl" %}

{%block contenu %}

<div id="nav" style="width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%;  margin-top:55px"> </div>

<script>
    window.addEventListener('DOMContentLoaded', function() 
    {
        var para = window.location.search;
        var result = getNav("consultCompetence.php", "consult",para);
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

</div>

{% endblock %}