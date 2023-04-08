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

<div id="nav" style="width: 15%;background: #e7e4df;border: 3px var(--color-brown) solid;position: fixed;height: 100%; margin-top:-0.5%;"> </div>

<script>
    window.addEventListener('DOMContentLoaded', function() 
    {
        var result = getNav("EditLangue.php", "edit");
        var id = document.getElementById("nav");
        id.innerHTML = result;
    });
</script>

<section class="text-start" style="margin-left:15%; width:85%">
        <h2 class="text-center" style="color: var(--bs-body-color);padding-top:5%;">Langues</h2>
            <div name="langues" style="display:grid; justify-content:center; border: 1px solid var(--color-blue);border-radius:3%;">
                {% for langue in tabLangues %}
                    
                    <p class="text-center" style="width:100%;  justify-content: center;margin:1%;"> {{ langue.getNomLangue() }} -&nbsp;{{ langue.getNiveauLangue() }} </p>
                   
                {% endfor %}
            </div>
        
        <div class="container-fluid text-start d-xl-flex align-items-center justify-content-xl-center profile profile-view" id="profile" style="width: 60%;height: 40%;border: 1px solid; margin-top:5%;">
            <form method="POST" style=width:70%;>
                <div class="row profile-row" style="margin-right: -60%;padding-right: 10%;">
                    <div class="col-md-8">
                        <div class="row" id="langues">
                               <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label form-label form-label">Langue</label>
                                        <input class="form-control form-control form-control" type="text" name="langue" placeholder="ex : Anglais" id="nomLangue"></div>
                                    </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label form-label form-label">Niveau</label>
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
                <div style="display: flex;justify-content: center; margin:2%;">
                <button class="btn btn-primary" data-bss-hover-animate="pulse" style="background: var(--color-brown);border-color: var(--color-brown);">Ajouter langue</button>
                </div>
            </form>
        </div>
        <a href="editCompetence.php" style="color: var(--color-brown)"><button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" style="margin-left: 189px;border-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);margin-top: 45px;">Précédent (compétences)</button></a>
    </section>
    
    <script src="../assets/js/edit.js"></script>
    <script>
        window.addEventListener("load", function () {
            this.document.getElementById("btnAjoutLangue").addEventListener("click", ajouterLangue);
        });
    </script>
<div>

{% endblock %}