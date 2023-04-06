<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Page CV</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
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
                var result = getNav("CVResume.php");
                var id = document.getElementById("nav");
                id.innerHTML = result;
            });

        </script>
            <div class="text-start" style="margin-left:15%; width:85%">
                <h3 style="text-align: center; padding-top:1%; margin-bottom:2%;">Résumé du CV :</h3>
                <div class="container" style="height: 679px;width: 579.6px;color: var(--bs-body-color);border-style: solid;border-color: var(--bs-body-color);"></div>
                <div class="row">
                    <div class="col d-flex justify-content-center" style="margin-top: 16px;margin-bottom: 32px;">
                        <div class="btn-group align-items-center" role="group">
                            <a href="CVCoordonnees.php" style="color: var(--color-brown)">
                                <button class="btn btn-primary" type="button" style="margin-left: 0px;margin-right: 15px;margin-top: 15px;color: var(--color-brown);background: var(--bs-btn-disabled-color);border-color: var(--color-brown);">
                                    Modifier le CV</button>
                            </a>
                                <button class="btn btn-primary" type="button" style="margin-top: 15px;margin-right: 15px;border-color: var(--color-brown);background: var(--bs-btn-disabled-color);color: var(--color-brown);">Sauvegarder le CV</button>
                                <button id="choixTemplate" class="btn btn-primary" type="button" style="margin-top: 15px;color: var(--color-brown);background: var(--bs-btn-disabled-color);border-color: var(--color-brown);">Choisir une Template</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
   
    <script>
        //event listener for the button
        document.getElementById("choixTemplate").addEventListener("click", function() {


            console.log("Choisissez une template");
        });
    </script>



    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.js"></script>
    <script src="../assets/js/Profile-Edit-Form-profile.js"></script>
</body>

</html>