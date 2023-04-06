<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CV Coordonnées</title>
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
                var result = getNav("CVCoordonnees.php");
                var id = document.getElementById("nav");
                id.innerHTML = result;
            });

        </script>
        <section class="text-start" style="margin-left:15%; width:85%;">
            <h2 class="text-center" style="color: var(--bs-body-color);padding-top:5%;">Coordonnées</h2>
            <div class="container-fluid text-start d-xl-flex align-items-center justify-content-xl-center profile profile-view" id="profile" style="width: 70%;height: 40%;border: 1px solid; margin-top:5%;">
                <form style="padding:5%;">
                    <div class="row profile-row">
                        <div class="col-md-4 relative">
                            <div class="avatar">
                                <div class="avatar-bg center" style="width: 150px;height: 150px;"></div>
                            </div><input class="form-control form-control form-control" type="file" name="avatar-file" style="margin-top: 8px;">
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label form-label">Prénom</label><input class="form-control form-control" type="text" name="prenom"></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label form-label">Nom</label><input class="form-control form-control" type="text" name="nom"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div><label class="form-label form-label">Intitulé du Poste</label><input class="form-control form-control" type="text"></div>
                                </div>
                                <div class="col">
                                    <div><label class="form-label form-label">Adresse</label><input class="form-control form-control" type="text"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label form-label">Code Postal</label><input class="form-control form-control" type="number"></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label form-label">Ville</label><input class="form-control form-control" type="text"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div><label class="form-label form-label">Téléphone</label><input class="form-control form-control" type="tel"></div>
                                </div>
                                <div class="col">
                                    <div><label class="form-label form-label">Adresse e-mail</label><input class="form-control form-control" type="email"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <h4 class="text-center" style="margin:2%;" >Ajoutez une phrase d'accroche</h4>
            <!--mettre le textarea dans un div pour pouvoir le centrer-->
            <div style="width: 50%;height: 60%;border: 1px solid;margin-left:25%; margin-right:25%; margin-bottom:5%;">
                <form><textarea class="form-control"></textarea> </form>
            </div>
            
        
        <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" style="margin-left: 189px;border-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);margin-bottom: 45px;"><a href="CVResume.php" style="color: var(--color-brown)">Précédent (résumé)</a></button>
        <button class="btn btn-primary float-end" data-bss-hover-animate="pulse" type="button" style="margin-left: 14px;margin-bottom: 44px;border-color: var(--color-brown);background: rgb(255,255,255);color: var(--color-brown);margin-right: 201px;"><a href="CVFormation.php" style="color: var(--color-brown)">Suivant (Formations)</a></button>
        </section>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.js"></script>
    <script src="../assets/js/Profile-Edit-Form-profile.js"></script>
</body>

</html>