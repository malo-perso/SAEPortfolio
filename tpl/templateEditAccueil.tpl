{% extends "templateBase.tpl" %}

{%block contenu %}

    <div id="nav" style="width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%;  margin-top:55px;"> </div>

        <script>
            window.addEventListener('DOMContentLoaded', function() 
            {
                var para = window.location.search;
                var result = getNav("editAccueil.php","edit",para);
                var id = document.getElementById("nav");
                id.innerHTML = result;
            });

        </script>
        
        <div style="margin-left:15%; width:85%;">

            <h1 class="text-center" style="padding-top:5%;">Page d'Accueil</h1>

            <form id="form" method="POST" style="margin-top: 5%;margin-left:5%; margin-right:5%;">
                <textarea name="accueil" style="width:100%; height:50%" >{{accueil}}</textarea>  
        
                <!-- bouton au milieu de la page -->
                <div style="display:flex; justify-content:center">
                <button id=save class="btn btn-primary" data-bss-hover-animate="pulse" type="submit" style="border-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>

    {% endblock %}
