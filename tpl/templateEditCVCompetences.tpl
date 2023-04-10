{% extends "templateBase.tpl" %}

{% block contenu %}

<div id="nav" style="width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%;  margin-top:55px;"> </div>

<script>
    window.addEventListener('DOMContentLoaded', function() 
    {
        var para = window.location.search;
        var result = getNav("editCVCompetence.php"+para, "edit");
        var id = document.getElementById("nav");
        id.innerHTML = result;
    });
</script>

<section class="text-start" style="margin-left:15%; width:85%">
        <h2 class="text-center" style="color: var(--bs-body-color);padding-top:5%;">Compétences</h2>
        <div class="container-fluid text-start d-xl-flex align-items-center justify-content-xl-center profile profile-view" id="profile" style="width: 60%;height: 40%;border: 1px solid; margin-top:5%;">
            <form method="post" style=width:70%;>
            <div class="row profile-row" style="margin-right: -60%;padding-right: 48px;">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-lg-12" style="margin-bottom: 1%;">
                            <label class="form-label form-label">Soft skills</label>
                            <textarea class="form-control form-control" style="margin-bottom:2%; placeholder="Utilisez ',','.' ou ';' entre chaque compétence">
                                {% for soft in softSkills %}
                                    {{ soft }};&nbsp;
                                {% endfor %}
                            </textarea>
                        </div>
                        <div class="col-lg-12" style="margin-bottom: 1%;">
                            <label class="form-label form-label">Hard skills</label>
                            <textarea class="form-control form-control" style="margin-bottom:2%; placeholder="Utilisez ',','.' ou ';' entre chaque compétence">
                                {% for hard in hardSkills %}
                                    {{ hard }};&nbsp;
                                {% endfor %}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>

            
    </div>
    <div style="display:flex; justify-content: center;">
            <div class="btn-group" role="group" style="width:55%">
                <a href=editExperience.php" style="color: var(--color-brown); margin:5%"><button class="btn btn-secondary" data-bss-hover-animate="pulse" type="button" style="order-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);">Précédent (expérience)</button></a>
                <button id="enregistrer" class="btn btn-secondary" data-bss-hover-animate="pulse" type="submit" style="margin:5%; order-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);">Enregistrer</button>
                <a href="editLangue.php" style="color: var(--color-brown); margin:5%;"><button class="btn btn-secondary" data-bss-hover-animate="pulse" type="button" style=" border-color: var(--color-brown);background: rgb(255,255,255);color: var(--color-brown);">Suivant (langue)</button></a>
            </div>
        </div>
    </form>
</section>

{% endblock %}