{% extends "templateBase.tpl" %}

{% block contenu %}
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
<link rel="stylesheet" href="../assets/css/animate.min.css">
<link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/Form-Select---Full-Date---Month-Day-Year.css">
<link rel="stylesheet" href="../assets/css/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.css">
<link rel="stylesheet" href="../assets/css/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1.css">
<link rel="stylesheet" href="../assets/css/Profile-Edit-Form-styles.css">
<link rel="stylesheet" href="../assets/css/Profile-Edit-Form.css">
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/bs-init.js"></script>
<script src="../assets/js/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.js"></script>
<script src="../assets/js/Profile-Edit-Form-profile.js"></script>
<script src="../assets/js/getNav.js"></script>

<div id="nav" style="width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%"> </div>

<script>
    window.addEventListener('DOMContentLoaded', function() 
    {
        var result = getNav("EditCompetence.php", "edit");
        var id = document.getElementById("nav");
        id.innerHTML = result;
    });
</script>

<section class="text-start" style="text-align: left;padding-top: 60px;padding-left: 186px;padding-right: 30px;">
    <h2 class="text-start d-xxl-flex align-items-center" style="color: var(--bs-body-color);margin-top: 0px;padding-top: 0px;padding-left: 0px;width: 253px;margin-left: 160px;">Compétences</h2>
    <div class="container-fluid text-start d-xl-flex align-items-center justify-content-xl-center profile profile-view" id="profile" style="width: 850px;height: 427.25px;border-style: solid;padding-right: 0px;margin-right: 26px;margin-top: 0px;padding-top: 0px;padding-left: 0px;margin-left: 159px;">
        <form>
            <div class="row profile-row" style="width: 865.2px;margin-right: -265px;padding-right: 48px;margin-left: -1px;">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-lg-12" style="margin-bottom: 40px;">
                            <label class="form-label form-label">Soft skills</label>
                            <textarea class="form-control form-control" style="width: 530px;height: 90px;" placeholder="Utilisez ',','.' ou ';' entre chaque compétence">
                                {% for soft in softSkills %}
                                    {{ soft.getNomComp() }};&nbsp;
                                {% endfor %}
                            </textarea>
                        </div>
                        <div class="col-lg-12" style="margin-bottom: 40px;">
                            <label class="form-label form-label">Hard skills</label>
                            <textarea class="form-control form-control" style="width: 530px;height: 90px;" placeholder="Utilisez ',','.' ou ';' entre chaque compétence">
                                {% for hard in hardSkills %}
                                    {{ hard.getNomComp() }};&nbsp;
                                {% endfor %}
                            </textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" style="margin-left: 189px;border-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);margin-top: 45px;"><a href="CVExperience.php" style="color: var(--color-brown)" >Précédent (expérience)</a></button>
<button class="btn btn-primary float-end" data-bss-hover-animate="pulse" type="button" style="border-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);margin-top: 45px;margin-left: 0px;margin-right: 21px;"><a href="CVLangue.php" style="color: var(--color-brown)">Suivant (langues)</a></button>

{% endblock %}