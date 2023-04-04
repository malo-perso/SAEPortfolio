<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>PageCVExpérience</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu">
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

    getNav("Contact.php");

    ?>

    <h1 class="text-center" style="margin-left: 152px;margin-top: 0px;padding-top: 30px;">Page de Contacts</h1>

    <div style="padding: 19px;margin: 15px;margin-left: 210px;margin-right: 55px;">
    <p class="text-center" style="border: 1px solid var(--color-blue);border-radius: 5px;margin-left: 360px;margin-right: 360px;">Nom contact - lien</p>
    </div>

    <div class="d-xl-flex justify-content-xl-center" style="margin: 15px;margin-right: 55px;margin-left: 210px;padding: 19px;border: 1px none var(--color-brown);">
    <form style="border: 1px solid var(--color-brown);padding: 15px;">
        <div class="row">
            <div class="col-xl-6"><label class="form-label form-label">Nom contact : </label><input class="form-control form-control" type="text" /></div>
            <div class="col-xl-6"><label class="form-label form-label">Lien / numéro / mail : </label><input class="form-control form-control" type="text" /></div>
        </div>
        <div class="row">
            <div class="col d-xl-flex justify-content-xl-center"><button class="btn btn-primary" type="submit" style="margin-top: 30px;margin-bottom: 6px;background: var(--color-brown);border-color: var(--color-brown);">Ajouter contact</button></div>
        </div>
    </form>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.js"></script>
    <script src="../assets/js/Profile-Edit-Form-profile.js"></script>
</body>

</html>