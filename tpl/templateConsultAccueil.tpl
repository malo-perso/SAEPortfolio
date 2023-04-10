{% extends "templateBase.tpl" %}

{%block contenu %}

    <div id="nav" style="width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%;  margin-top:55px;"> </div>

        <script>
            window.addEventListener('DOMContentLoaded', function() 
            {
                var para = window.location.search;
                var result = getNav("consultAccueil.php"+para,"consult");
                var id = document.getElementById("nav");
                id.innerHTML = result;
            });

        </script>
        
        <div style="margin-left:15%; width:85%;">

            <h1 class="text-center" style="padding-top:5%;">Page d'Accueil</h1>

            <div id=editorjs style="margin-top: 5%;margin-left:5%; margin-right:5%;">{{ contenu }}</div>


        </div>

        <script src="ckeditor/ckeditor.js"></script>

        <!-- Load Editor.js's Core -->
        <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>

    </div>

{% endblock %}
