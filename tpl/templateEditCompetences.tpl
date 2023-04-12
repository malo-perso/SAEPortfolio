{% extends "templateBase.tpl" %}

{% block contenu %}

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div id="nav" style="width: 15%; background: #e7e4df; border-style: solid; border-color: var(--color-brown); position: fixed; height: 100%"></div>

<script>
    window.addEventListener('DOMContentLoaded', function() {
        var para = window.location.search;
        var result = getNav("editCompetence.php", "edit", para);
        var id = document.getElementById("nav");
        id.innerHTML = result;
    });
</script>

<div style="margin-left: 15%; width: 85%;">

    <h1 class="text-center" style="padding-top: 5%;">Page de Compétences</h1>

        <form id="form" method="POST" style="margin-top: 5%;margin-left:5%; margin-right:5%;">
            <textarea name="competence" style="width:100%; height:50%" >{{competence}}</textarea>

            <div style="display:flex; justify-content:center">
                <button id=save type="submit" class="btn btn-primary" data-bss-hover-animate="pulse" style="border-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);">Enregistrer</button>
            </div>
        </form>
</div> 
</div>

{% endblock %}