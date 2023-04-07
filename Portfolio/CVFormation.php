<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CV Formation</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.css">
    <link rel="stylesheet" href="../assets/css/Profile-Edit-Form-styles.css">
    <link rel="stylesheet" href="../assets/css/Profile-Edit-Form.css">
    <script src="../assets/js/getNav.js"></script>
</head>

<body>
    <div class="text-start">
    <div id="nav" style="width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%"> </div>

    <script>
            window.addEventListener('DOMContentLoaded', function() 
            {
                var result = getNav("CVFormation.php");
                var id = document.getElementById("nav");
                id.innerHTML = result;
            });

        </script>
        <section class="text-start" style="margin-left:15%; width:85%">

            <h2 class="text-center" style="color: var(--bs-body-color);padding-top: 5%;">Formations</h2>

            <div class="container-fluid text-start d-xl-flex align-items-center justify-content-xl-center profile profile-view" style="margin-top:5%;width:40%; border-style: solid;border-color: var(--color-brown);">
                <div class="col" style=padding:2%;>
                        <div class="row">
                            <p class="index_nom_ville">1 : Nom de l&#39;établissement - Ville</p>
                        </div>
                    <div class="row">
                        <p class="diplome_domaine_dates">Diplôme - domaine détude - date début | date fin</p>
                    </div>
                </div>
            </div>

            
            <div class="container-fluid text-start d-xl-flex align-items-center justify-content-xl-center profile profile-view" id="profile" style="width: 60%;height: 40%;border: 1px solid; margin-top:5%;">
                <form method="POST" style="width:70%;">
                    <div class="row profile-row" style="margin-right: -60%;padding-right: 48px;">
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label form-label form-label">Nom de l'établissement</label>
                                        <input class="form-control form-control form-control" type="text" name="nomEtat">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label form-label form-label">Ville</label>
                                        <input class="form-control form-control form-control" type="text" name="ville">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div><label class="form-label form-label form-label">Diplome</label>
                                        <select name="diplome" class="form-select">
                                            <optgroup label="Sélectionner">
                                                <option value="cap">CAP</option>
                                                <option value="bep">BEP</option>
                                                <option value="BAC" selected="">Baccalauréat</option>
                                                <option value="bacPro">Baccalauréat Professionnel</option>
                                                <option value="bts">BTS</option>
                                                <option value="but">BUT</option>
                                                <option value="deug">DEUG</option>
                                                <option value="deust">DEUST</option>
                                                <option value="dut">DUT</option>
                                                <option value="licence">Licence</option>
                                                <option value="licence1">Licence 1</option>
                                                <option value="licence2">Licence 2</option>
                                                <option value="licence3">Licence 3</option>
                                                <option value="bachelor">Bachelor</option>
                                                <option value="licencePro">Licence Professionnelle</option>
                                                <option value="master">Master</option>
                                                <option value="master1">Master 1</option>
                                                <option value="master2">Master 2</option>
                                                <option value="dess">DESS</option>
                                                <option value="dea">DEA</option>
                                                <option value="dipIngen">Diplome ingénieur</option>
                                                <option value="doctorat">Doctorat</option>
                                            </optgroup>
                                        </select></div>
                                </div>
                                <div class="col">
                                    <div><label class="form-label form-label form-label">Domaine d'étude</label>
                                    <input class="form-control form-control form-control" name="domaine" type="text">
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label form-label form-label">Mention</label>
                                        <input class="form-control" name="mention" type="text">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><label class="form-label form-label form-label form-label">Date début</label>
                                    <div class="d-lg-flex align-items-lg-center form-group mb-3">
                                        <select name="moisDeb" class="form-select form-select form-select">
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
                                        <input class="form-control" type="number" min="1958" max="2033" name="anneeDeb"></div>
                                </div>
                                <div class="col-sm-12 col-md-6"><label class="form-label form-label form-label form-label">Date fin</label>
                                    <div class="d-lg-flex align-items-lg-center form-group mb-3">
                                        <select name="moisFin" class="form-select form-select form-select">
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
                                        <input class="form-control" type="number" min="1958" max="2033" name="anneeFin"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <button class="btn btn-primary float-none d-lg-flex" data-bss-hover-animate="pulse" type="submit" style="margin-right: 15px;margin-left: 15px;margin-bottom: 15px;width: 194.5px;text-align: center;margin-top: 22px;color: var(--bs-body-bg);border-color: var(--color-brown);background: var(--color-brown);">Ajouter votre formation</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php

                $nometat = $ville = $diplome = $domaine = $mention = $moisDeb = $anneeDeb = $moisFin = $anneeFin = "";

            if(isset($_POST['nomEtat']) && isset($_POST['ville']) && isset($_POST['diplome']) && isset($_POST['domaine']) && isset($_POST['mention']) && isset($_POST['moisDeb']) && isset($_POST['anneeDeb']) && isset($_POST['moisFin']) && isset($_POST['anneeFin'])){
                $nometat = $_POST['nomEtat'];
                $ville  = $_POST['ville'];
                $diplome = $_POST['diplome'];
                $domaine = $_POST['domaine'];
                $mention = $_POST['mention'];
                $moisDeb = $_POST['moisDeb'];
                $anneeDeb = $_POST['anneeDeb'];
                $moisFin = $_POST['moisFin'];
                $anneeFin = $_POST['anneeFin'];
                
                echo $nometat."<br>";
                echo $domaine."<br>";
                echo $diplome."<br>";
                echo $mention."<br>";
                echo $moisDeb."<br>";
                echo $anneeDeb."<br>";
                echo $moisFin."<br>";
                echo $anneeFin."<br>";

            }

            ?>
            </div>

           
        
            <div style="display:flex; justify-content: center;">
            <div class="btn-group" role="group" style="width:55%">
                <a href="CVCoordonnees.php" style="color: var(--color-brown); margin:5%"><button class="btn btn-secondary" data-bss-hover-animate="pulse" type="button" style="order-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);">Précédent (coordonnées)</button></a>
                <a href="#" style="margin:5%;"><button class="btn btn-secondary" data-bss-hover-animate="pulse" type="button" style="border-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);">Enregistrer</button></a>
                <a href="CVExperience.php" style="color: var(--color-brown); margin:5%;"><button class="btn btn-secondary" data-bss-hover-animate="pulse" type="button" style=" border-color: var(--color-brown);background: rgb(255,255,255);color: var(--color-brown);">Suivant (expérience)</button></a>
        
            </div>
        </div>
    </section>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.js"></script>
    <script src="../assets/js/Profile-Edit-Form-profile.js"></script>
</body>

</html>