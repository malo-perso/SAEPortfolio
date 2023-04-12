{% extends "templateBase.tpl" %}

{% block contenu %}

    <div id="nav" style="width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%"> </div>

    <script>
            window.addEventListener('DOMContentLoaded', function() 
            {
                var para = window.location.search;
                var result = getNav("editProjets.php", "edit",para);
                var id = document.getElementById("nav");
                id.innerHTML = result;
            });

        </script>
        <div style="margin-left:15%; width:85%;">

            <h1 class="text-center" style="padding-top: 30px;">Page de Projets</h1>

            <form id="form" method="POST" style="margin-top: 5%;margin-left:5%; margin-right:5%;">
                <textarea name="projet" style="width:100%; height:50%" >{{projet}}</textarea>
                
                <!-- bouton au milieu de la page -->
                <div style="display:flex; justify-content:center">
                <button id=save class="btn btn-primary" data-bss-hover-animate="pulse" type="submit" style="border-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
{% endblock %}