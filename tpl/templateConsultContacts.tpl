{% extends "templateBase.tpl" %}

{% block contenu %}

<div id="nav" style="width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%;  margin-top:55px;"> </div>

<script>
    window.addEventListener('DOMContentLoaded', function() 
    {
        var para = window.location.search;
        var result = getNav("consultCompetence.php", "consult",para);
        var id = document.getElementById("nav");
        id.innerHTML = result;
    });
</script>

<div style="margin-left:15%; width:85%;">

    <h1 class="text-center" style="padding-top: 5%;">Page de Contacts</h1>

    {% for contact in tabContacts %}
        <div style="display:flex; justify-content:center;">
            <p class="text-center" style="width:35%; border: 1px solid var(--color-blue);border-radius:3%; justify-content: center;margin:3%;"> {{ contact.getNomContact() }} -&nbsp;{{ contact.getDescContact() }} </p>
        </div>
    {% endfor %}
</div>

{% endblock %}