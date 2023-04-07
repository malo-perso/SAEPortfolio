{% extends "templateBase.tpl" %}
{%block contenu %}

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
        var result = getNav("CVCompetence.php");
        var id = document.getElementById("nav");
        id.innerHTML = result;
    });
</script>

<div style="border-color: var(--color-brown);">
    <section class="text-start" style="text-align: left;padding-top: 60px;padding-left: 186px;padding-right: 30px;">
        <h2 class="text-start d-xxl-flex align-items-center" style="color: var(--bs-body-color);margin-top: 0px;padding-top: 0px;padding-left: 0px;width: 253px;margin-left: 160px;">Langues</h2>
        {% for langue in tabLangues %}
            <div style="display:flex; justify-content:center;">
                <p class="text-center" style="width:35%; border: 1px solid var(--color-blue);border-radius:3%; justify-content: center;margin:3%;"> {{ langue.getNomLangue() }} -&nbsp;{{ langue.getNiveauLangue() }} </p>
            </div>
        {% endfor %}
        <div class="container-fluid text-start d-xl-flex align-items-center justify-content-xl-center profile profile-view" id="profile" style="width: 850px;border-style: solid;padding-right: 0px;margin-right: 26px;margin-top: 0px;padding-top: 0px;padding-left: 0px;margin-left: 159px;">
            <form>
                <div class="row profile-row" style="width: 865.2px;margin-right: -265px;padding-right: 48px;margin-left: -1px;">
                    <div class="col-md-8">
                        <div class="row" style="margin-top: -14px;" id="langues">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3" style="padding-top: 0px;"><label class="form-label form-label form-label">Langue</label>
                                    <input class="form-control form-control form-control" type="text" name="langue" placeholder="ex : Anglais" id="nomLangue"></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label form-label form-label">Niveau</label>
                                        <select class="form-select form-select" name="niveau" style="width: 190px;" id="niveauLangue">
                                            <option value="">Débutant (A1)</option>
                                            <option value="">Elémentaire (A2)</option>
                                            <option value="">Intermédiare (B1)</option>
                                            <option value="">Intermédiaire (B2)</option>
                                            <option value="">Avancé (C1)</option>
                                            <option value="">Expérimenté (C2)</option>
                                            <option value="">Langue maternelle</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="row profile-row" style="width: 865.2px;margin-right: -265px;padding-right: 48px;margin-left: -1px;margin-top: -1px;">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col d-flex justify-content-center"><button class="btn btn-primary" style="background: var(--color-brown);border-color: var(--color-brown);margin-left: 3px;" id="btnAjoutLangue">Ajouter langue</button></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" style="margin-left: 189px;border-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);margin-top: 45px;"><a href="CVCompetence.php" style="color: var(--color-brown)">Précédent (compétences)</a></button>
    <button class="btn btn-primary float-end" data-bss-hover-animate="pulse" type="submit" style="border-style: solid;border-color: var(--color-brown);background: var(--color-brown);color: var(--bs-body-bg);margin-top: 45px;margin-left: 0px;margin-right: 21px;">Enregistrer</button>

    <script src="../assets/js/edit.js"></script>
    <script>
        window.addEventListener("load", function () {
            this.document.getElementById("btnAjoutLangue").addEventListener("click", ajouterLangue);
        });
    </script>
<div>

{% endblock %}