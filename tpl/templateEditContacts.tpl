{% extends "templateBase.tpl" %}

{% block contenu %}

<div id="nav" style="width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%; margin-top:55px;"> </div>

<script>
    window.addEventListener('DOMContentLoaded', function() 
    {
        var para = window.location.search;
        var result = getNav("editContact.php", "edit",para);
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

    <div class="d-xl-flex justify-content-xl-center" style="border: 1px none var(--color-brown);">
        <form style="border: 1px solid var(--color-brown);padding: 15px;">
            <div class="row">
                <div class="col-xl-6"><label class="form-label form-label">Nom contact : </label><input class="form-control form-control" type="text" name="nom"/></div>
                <div class="col-xl-6"><label class="form-label form-label">Lien / numéro / mail : </label><input class="form-control form-control" type="text" name"type" /></div>
            </div>
            <div class="row">
                <div class="col d-xl-flex justify-content-xl-center"><button class="btn btn-primary" type="submit" style="background: var(--color-brown);border-color: var(--color-brown); margin:3%;">Ajouter contact</button></div>
            </div>
        </form>
    </div>
</div>

{% endblock %}