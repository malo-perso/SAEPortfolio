<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CV Expérience</title>
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
    <script src="../assets/js/getNav.js"></script>
</head>

<body>
<div id="nav" style="width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%"> </div>

<script>
            window.addEventListener('DOMContentLoaded', function() 
            {
                var result = getNav("CVExperience.php" ,"CV");
                var id = document.getElementById("nav");
                id.innerHTML = result;
            });

</script>
    
    <section class="text-start" style="margin-left:15%; width:85%;">

        <h2 class="text-center" style="color: var(--bs-body-color);padding-top:5%;">Expériences</h2>
        
        <!-- container au milieu et 2 lignes pour les balises p -->
        <div class="container-fluid text-start d-xl-flex align-items-center justify-content-xl-center profile profile-view" style="margin-top:5%;width:40%; border-style: solid;border-color: var(--color-brown);">
            <div class ="col" style=padding:2%;>
                <div class="row">
                    <p class="index_nom_ville">1 : Intitulé du poste - Employeur</p><br>
                </div>
                <div class="row">
                    <p class="diplome_domaine_dates">Type de contrat - date début | date fin</p>
                </div>
            </div>
        </div>


        <div class="container-fluid text-start d-xl-flex align-items-center justify-content-xl-center profile profile-view" id="profile" style="width: 60%;height: 40%;border: 1px solid; margin-top:5%;">
            <form method="POST" style=width:70%;>
                <div class="row profile-row" style="margin-right: -60%;padding-right: 48px;">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3" style="padding-top: 0px;">
                                <label class="form-label form-label form-label">Intitulé du poste</label>
                                <input class="form-control form-control form-control" type="text" name="intitulePoste" placeholder="ex : Vendeur">
                            </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label form-label form-label">Ville</label>
                                    <input class="form-control form-control form-control" type="text" name="ville" placeholder="ex: Le Havre">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div><label class="form-label form-label form-label">Employeur</label>
                                <input class="form-control form-control form-control" name="employeur" type="text" placeholder="ex : Auchan">
                            </div>
                            </div>
                            <div class="col">
                                <div><label class="form-label form-label form-label">Type de contrat</label>
                                <input class="form-control form-control form-control" name="contrat" type="text" placeholder="ex : CDD">
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><label class="form-label form-label form-label form-label">Date début</label>
                                <div class="d-lg-flex align-items-lg-center form-group mb-3">
                                    <select name="moisDeb" class="form-select form-select form-select" style="width: 123.4px;">
                                        <optgroup label="Mois">
                                            <option value="" selected="">Mois</option>
                                            <option value="1">Janvier</option>
                                            <option value="2">Février</option>
                                            <option value="3">Mars</option>
                                            <option value="4">Avril</option>
                                            <option value="5">Mai</option>
                                            <option value="6">Juin</option>
                                            <option value="7">Juillet</option>
                                            <option value="8">Août</option>
                                            <option value="9">Septembre</option>
                                            <option value="10">Octobre</option>
                                            <option value="11">Novembre</option>
                                            <option value="12">Décembre</option>
                                        </optgroup>
                                    </select><input class="form-control" type="number" min="1958" max="2033" value="2000" name="anneeDeb"></div>
                            </div>
                            <div class="col-sm-12 col-md-6"><label class="form-label form-label form-label form-label">Date fin</label>
                                <div class="d-lg-flex align-items-lg-center form-group mb-3">
                                    <select name="moisFin" class="form-select form-select form-select" style="width: 123.4px;">
                                        <optgroup label="Mois">
                                            <option value="" selected="">Mois</option>
                                            <option value="1">Janvier</option>
                                            <option value="2">Février</option>
                                            <option value="3">Mars</option>
                                            <option value="4">Avril</option>
                                            <option value="5">Mai</option>
                                            <option value="6">Juin</option>
                                            <option value="7">Juillet</option>
                                            <option value="8">Août</option>
                                            <option value="9">Septembre</option>
                                            <option value="10">Octobre</option>
                                            <option value="11">Novembre</option>
                                            <option value="12">Décembre</option>
                                        </optgroup>
                                    </select>
                                    <input class="form-control" type="number" min="1958" max="2033" value="2000" name="anneeFin"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12" style="margin-bottom: 17px;">
                                <label class="form-label form-label">Description</label>
                                <textarea class="form-control form-control" name="description" style="width: 530px;height: 90px;" placeholder="Description des missions effectuer"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-center" style="margin-bottom: 17px;margin-top: 0px;">
                                <button class="btn btn-primary d-lg-flex" data-bss-hover-animate="pulse" type="submit" style="background: var(--color-brown);border-color: var(--color-brown);margin-left: 3px;padding-top: 6px;margin-top: 8px;">Ajouter expérience</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
                if(isset($_POST['intitulePoste']) && isset($_POST['ville']) && isset($_POST['employeur']) && isset($_POST['contrat']) && isset($_POST['moisDeb']) && isset($_POST['anneeDeb']) && isset($_POST['moisFin']) && isset($_POST['anneeFin']) && isset($_POST['description'])){
                    $intitulePoste = $_POST['intitulePoste'];
                    $ville = $_POST['ville'];
                    $employeur = $_POST['employeur'];
                    $contrat = $_POST['contrat'];
                    $moisDeb = $_POST['moisDeb'];
                    $anneeDeb = $_POST['anneeDeb'];
                    $moisFin = $_POST['moisFin'];
                    $anneeFin = $_POST['anneeFin'];
                    $description = $_POST['description'];
                    
                    echo $intitulePoste."<br>";
                    echo $ville."<br>";
                    echo $employeur."<br>";
                    echo $contrat."<br>";
                    echo $moisDeb."<br>";
                    echo $anneeDeb."<br>";
                    echo $moisFin."<br>";
                    echo $anneeFin."<br>";
                    echo $description."<br>";
                    
                }
            ?>
        </div>
    
        <div style="display:flex; justify-content: center;">
            <div class="btn-group" role="group" style="width:55%">
                <a href="CVFormation.php" style="color: var(--color-brown); margin:5%"><button class="btn btn-secondary" data-bss-hover-animate="pulse" type="button" style="order-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);">Précédent (formations)</button></a>
                <a href="#" style="margin:5%;"><button class="btn btn-secondary" data-bss-hover-animate="pulse" type="button" style="border-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);">Enregistrer</button></a>
                <a href="CVCompetence.php" style="color: var(--color-brown); margin:5%;"><button class="btn btn-secondary" data-bss-hover-animate="pulse" type="button" style=" border-color: var(--color-brown);background: rgb(255,255,255);color: var(--color-brown);">Suivant (compétences)</button></a>
            </div>
        </div>
    </section>

    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.js"></script>
    <script src="../assets/js/Profile-Edit-Form-profile.js"></script>
</body>

</html>