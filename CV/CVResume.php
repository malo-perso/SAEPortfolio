<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>PageCVCoord</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
    <link rel="stylesheet" href="../assets/css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.css">
    <link rel="stylesheet" href="../assets/css/Profile-Edit-Form-styles.css">
    <link rel="stylesheet" href="../assets/css/Profile-Edit-Form.css">
</head>

<body>
    <div class="text-start">
    <?php  

        include '../common/nav.inc.php';

        getNav();

    ?>
        <section class="text-start" style="text-align: left;padding-top: 60px;padding-left: 186px;padding-right: 30px;">
            <h2 style="text-align: center;">Résumé du CV :</h2>
            <div class="container" style="height: 679px;width: 579.6px;color: var(--bs-body-color);border-style: solid;border-color: var(--bs-body-color);"></div>
            <div class="row">
                <div class="col d-flex justify-content-center" style="margin-top: 16px;margin-bottom: 32px;">
                    <div class="btn-group align-items-center" role="group"><button class="btn btn-primary" type="button" style="margin-left: 0px;margin-right: 15px;margin-top: 15px;color: var(--color-brown);background: var(--bs-btn-disabled-color);border-color: var(--color-brown);"><a href="CVCoordonnees.php" style="color: var(--color-brown)">Modifier le CV</a></button><button class="btn btn-primary" type="button" style="margin-top: 15px;margin-right: 15px;border-color: var(--color-brown);background: var(--bs-btn-disabled-color);color: var(--color-brown);">Sauvegarder le CV</button><button class="btn btn-primary" type="button" style="margin-top: 15px;color: var(--color-brown);background: var(--bs-btn-disabled-color);border-color: var(--color-brown);">Choisir une Template</button></div>
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