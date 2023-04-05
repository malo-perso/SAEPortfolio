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
</head>

<body>
    <?php  

        include '../common/nav.inc.php';

        getNav("CVExperience.php");

    ?>
    <section class="text-start" style="text-align: left;padding-top: 60px;padding-left: 186px;padding-right: 30px;">
        <h2 class="text-start d-xxl-flex align-items-center" style="color: var(--bs-body-color);margin-top: 0px;padding-top: 0px;padding-left: 0px;width: 253px;margin-left: 160px;">Expériences</h2>
        <section style="margin: 0px 10px 10px 10px;margin-top: 34px;border-style: solid;border-color: var(--color-brown);width: 500px;padding: 22px 10px 10px 10px;margin-bottom: 14px;margin-right: 23px;padding-left: 51px;margin-left: 164px;">
            <p class="index_nom_ville">1 : Intitulé du poste - Employeur</p>
            <p class="diplome_domaine_dates">Type de contrat - date début | date fin</p>
        </section>
        <div class="container-fluid text-start d-xl-flex align-items-center justify-content-xl-center profile profile-view" id="profile" style="width: 850px;height: 500px;border-style: solid;padding-right: 0px;margin-right: 26px;margin-top: 0px;padding-top: 0px;padding-left: 0px;margin-left: 159px;">
            <form>
                <div class="row profile-row" style="width: 865.2px;margin-right: -265px;padding-right: 48px;margin-left: -1px;">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3" style="padding-top: 0px;"><label class="form-label form-label form-label">Intitulé du poste</label><input class="form-control form-control form-control" type="text" name="firstname" placeholder="ex : Vendeur"></div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group mb-3"><label class="form-label form-label form-label">Ville</label><input class="form-control form-control form-control" type="text" name="lastname" placeholder="ex: Le Havre"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div><label class="form-label form-label form-label">Employeur</label><input class="form-control form-control form-control" type="text" placeholder="ex : Auchan"></div>
                            </div>
                            <div class="col">
                                <div><label class="form-label form-label form-label">Type de contrat</label><input class="form-control form-control form-control" type="text" placeholder="ex : CDD"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><label class="form-label form-label form-label form-label">Date début</label>
                                <div class="d-lg-flex align-items-lg-center form-group mb-3"><select class="form-select form-select form-select" style="width: 123.4px;">
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
                                <div class="d-lg-flex align-items-lg-center form-group mb-3"><select class="form-select form-select form-select" style="width: 123.4px;">
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
                        </div>
                        <div class="row">
                            <div class="col-lg-12" style="margin-bottom: 17px;"><label class="form-label form-label">Description</label><textarea class="form-control form-control" style="width: 530px;height: 90px;" placeholder="Description des missions effectuer"></textarea></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-center" style="margin-bottom: 17px;margin-top: 0px;"><button class="btn btn-primary d-lg-flex" data-bss-hover-animate="pulse" type="button" style="background: var(--color-brown);border-color: var(--color-brown);margin-left: 3px;padding-top: 6px;margin-top: 8px;">Ajouter expérience</button></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" style="margin-left: 189px;border-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);margin-top: 45px;"><a href="CVFormation.php" style="color: var(--color-brown)">Précédent (formations)</a></button>
    <button class="btn btn-primary float-end" data-bss-hover-animate="pulse" type="button" style="margin-top: 40px;margin-right: 27px;background: rgba(255,255,255,0.5);color: var(--color-brown);border-style: solid;border-color: var(--color-brown);"><a href="CVCompetence.php" style="color: var(--color-brown)">Suivant (compétences)</a></button>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.js"></script>
    <script src="../assets/js/Profile-Edit-Form-profile.js"></script>
</body>

</html>