<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CV Compétences</title>
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
                var result = getNav("CVCompetence.php");
                var id = document.getElementById("nav");
                id.innerHTML = result;
            });

        </script>

    <section class="text-start" style="margin-left:15%; width:85%">
        <h2 class="text-center" style="color: var(--bs-body-color);padding-top:5%;">Compétences</h2>
        <div class="container-fluid text-start d-xl-flex align-items-center justify-content-xl-center profile profile-view" id="profile" style="width: 60%;height: 40%;border: 1px solid; margin-top:5%;">
            <form style=width:70%;>
                <div class="row profile-row" style="margin-right: -60%;padding-right: 48px;">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-lg-12" style="margin-bottom: 40px;"><label class="form-label form-label">Soft skills</label><textarea class="form-control form-control" style="width: 530px;height: 90px;" placeholder="Rédiger une ligne par soft skills"></textarea></div>
                            <div class="col-lg-12" style="margin-bottom: 40px;"><label class="form-label form-label">Hard skills</label><textarea class="form-control form-control" style="width: 530px;height: 90px;" placeholder="Rédiger une ligne par hard skills"></textarea></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" style="margin-top: 2%;margin-left: 189px;border-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);margin-bottom: 45px;"><a href="CVExperience.php" style="color: var(--color-brown)" >Précédent (expérience)</a></button>
        <button class="btn btn-primary float-end" data-bss-hover-animate="pulse" type="button" style="margin-top: 2%;margin-left: 14px;margin-bottom: 44px;border-color: var(--color-brown);background: rgb(255,255,255);color: var(--color-brown);margin-right: 201px;"><a href="CVLangue.php" style="color: var(--color-brown)">Suivant (langues)</a></button>

    </section>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.js"></script>
    <script src="../assets/js/Profile-Edit-Form-profile.js"></script>
</body>

</html>