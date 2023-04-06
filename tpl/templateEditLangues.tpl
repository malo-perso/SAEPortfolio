{% extends "templateBase.tpl" %}

{%block contenu %}

<div style="border-color: var(--color-brown);">
    
    <div style="width: 155px;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 900px;padding-top: 0px;margin-top: 0px;">
        <ul class="nav nav-tabs flex-column" style="border-style: none;">
            <li class="nav-item"><a class="nav-link" href="#" style="color: var(--bs-body-color);">Page accueil</a></li>
            <li class="nav-item"><a class="nav-link active" href="#" style="color: var(--bs-body-color);background: #c8b79c;border-color: var(--bs-body-bg);border-left: px solid var(--color-blue);">CV</a>
                <ul class="nav nav-tabs" style="border-style: none;">
                    <li class="nav-item"><a class="nav-link active" href="#" style="border-style: none;color: var(--bs-body-color);width: 150px;background: #e7e4df;">Coordonées</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" style="color: var(--bs-body-color);width: 150px;">Formations</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" style="color: var(--bs-body-color);background: #e7e4df;width: 150px;">Expériences</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" style="color: var(--bs-body-color);width: 150px;">Compétences</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" style="color: var(--bs-body-color);width: 150px;background: #c8b79c;">Langues</a></li>
                </ul>
            </li>
            <li class="nav-item"><a class="nav-link" href="#" style="border-style: none;color: var(--bs-body-color);">Compétences</a></li>
            <li class="nav-item"><a class="nav-link" href="#" style="color: var(--bs-body-color);">Projets</a></li>
            <li class="nav-item"><a class="nav-link" href="#" style="border-style: solid;color: var(--bs-body-color);">Contacts</a></li>
        </ul>
    </div>

    <section class="text-start" style="text-align: left;padding-top: 60px;padding-left: 186px;padding-right: 30px;">
        <h2 class="text-start d-xxl-flex align-items-center" style="color: var(--bs-body-color);margin-top: 0px;padding-top: 0px;padding-left: 0px;width: 253px;margin-left: 160px;">Langues</h2>
        <div class="container-fluid text-start d-xl-flex align-items-center justify-content-xl-center profile profile-view" id="profile" style="width: 850px;border-style: solid;padding-right: 0px;margin-right: 26px;margin-top: 0px;padding-top: 0px;padding-left: 0px;margin-left: 159px;">
            <form>
                <div class="row profile-row" style="width: 865.2px;margin-right: -265px;padding-right: 48px;margin-left: -1px;">
                    <div class="col-md-8">
                        <div class="row" style="margin-top: -14px;" id="langues">
                            {% for langue in langues %}
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3" style="padding-top: 0px;"><label class="form-label form-label form-label">Langue</label>
                                    <input class="form-control form-control form-control" type="text" name="firstname" placeholder="ex : Anglais" id="nomLangue" value={{ langue.getNomLangue() }}></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label form-label form-label">Niveau</label>
                                        <select class="form-select form-select" style="width: 190px;" id="niveauLangue">
                                            <option value="" selected=""> {{ langue.getNiveauLangue() }} </option>
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
                            {% endfor %}
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
    <button class="btn btn-primary float-end" data-bss-hover-animate="pulse" type="button" style="border-style: solid;border-color: var(--color-brown);background: var(--color-brown);color: var(--bs-body-bg);margin-top: 45px;margin-left: 0px;margin-right: 21px;">Enregistrer</button>

    <script src="../assets/js/edit.js"></script>
    <script>
        window.addEventListener("load", function () {
            this.document.getElementById("btnAjoutLangue").addEventListener("click", ajouterLangue);
        });
    </script>

    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.js"></script>
    <script src="../assets/js/Profile-Edit-Form-profile.js"></script>
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

<div>

{% endblock %}