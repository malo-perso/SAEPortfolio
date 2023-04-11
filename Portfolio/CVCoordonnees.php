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
                var result = getNav("CVCoordonnees.php", "CV");
                var id = document.getElementById("nav");
                id.innerHTML = result;
            });

        </script>
        <section class="text-start" style="margin-left:15%; width:85%;">
            <h2 class="text-center" style="color: var(--bs-body-color);padding-top:5%;">Coordonnées</h2>
            <div class="container-fluid text-start d-xl-flex align-items-center justify-content-xl-center profile profile-view" id="profile" style="width: 70%;height: 40%;border: 1px solid; margin-top:5%;">
                <form method="POST" style="padding:5%;">
                    <div class="row profile-row">
                        <div class="col-md-4 relative">
                            <div class="avatar">
                                <div class="avatar-bg center" style="width: 150px;height: 150px;"></div>
                            </div><input class="form-control form-control form-control" type="file" name="avatar-file" style="margin-top: 8px;">
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label form-label">Prénom</label>
                                        <input class="form-control form-control" type="text" name="prenom">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label form-label">Nom</label>
                                        <input class="form-control form-control" type="text" name="nom">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <label class="form-label form-label">Intitulé du Poste</label
                                        ><input class="form-control form-control" name="intitulePoste" type="text"></div>
                                </div>
                                <div class="col">
                                    <div>
                                        <label class="form-label form-label">Adresse</label>
                                        <input class="form-control form-control" name="adr" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label form-label">Code Postal</label>
                                        <input class="form-control form-control" name="codePostal" type="number"></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="form-label form-label">Ville</label>
                                        <input class="form-control form-control" name="ville" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <label class="form-label form-label">Téléphone</label>
                                        <input class="form-control form-control" name="tel" type="tel">
                                    </div>
                                </div>
                                <div class="col">
                                    <div>
                                        <label class="form-label form-label">Adresse e-mail</label>
                                        <input class="form-control form-control" name="mail" type="email">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                <?php
                    $prenom = $nom = $intitulePoste = $adr = $codePostal = $ville = $tel = $mail = $accroche = "";
                    if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['intitulePoste']) && isset($_POST['adr']) && isset($_POST['codePostal']) && isset($_POST['ville']) && isset($_POST['tel']) && isset($_POST['mail']))
                    {
                        $prenom = $_POST['prenom'];
                        $nom = $_POST['nom'];
                        $intitulePoste = $_POST['intitulePoste'];
                        $adr = $_POST['adr'];
                        $codePostal = $_POST['codePostal'];
                        $ville = $_POST['ville'];
                        $tel = $_POST['tel'];
                        $mail = $_POST['mail'];
                        $accroche = $_POST['accroche'];
                        
                        echo "<script>console.log('".$prenom."');</script>";
                        echo "<script>console.log('".$nom."');</script>";
                        echo "<script>console.log('".$intitulePoste."');</script>";
                        echo "<script>console.log('".$adr."');</script>";
                        echo "<script>console.log('".$codePostal."');</script>";
                        echo "<script>console.log('".$ville."');</script>";
                        echo "<script>console.log('".$tel."');</script>";
                        echo "<script>console.log('".$mail."');</script>";
                        echo "<script>console.log('".$accroche."');</script>";


                    }
                ?>
            </div>

            <h4 class="text-center" style="margin:2%;" >Ajoutez une phrase d'accroche</h4>
            <!--mettre le textarea dans un div pour pouvoir le centrer-->
            <div style="width: 50%;height: 60%;border: 1px solid;margin-left:25%; margin-right:25%; margin-bottom:5%;">
                <textarea name="accroche" class="form-control"></textarea> 
                
            </div>
            
        <div style="display:flex; justify-content: center;">
            <div class="btn-group" role="group" style="width:50%">
                <a href="CVResume.php" style="color: var(--color-brown); margin:5%"><button class="btn btn-secondary" data-bss-hover-animate="pulse" type="button" style="border-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);">Précédent (résumé)</button></a>
                <a href="#" style="margin:5%;"><button class="btn btn-secondary" data-bss-hover-animate="pulse" type="submit" style="border-style: solid;border-color: var(--color-brown);background: rgba(255,255,255,0.5);color: var(--color-brown);">Enregistrer</button></a>
                <a href="CVFormation.php" style="color: var(--color-brown); margin:5%;"><button class="btn btn-secondary" data-bss-hover-animate="pulse" type="button" style=" border-color: var(--color-brown);background: rgb(255,255,255);color: var(--color-brown);">Suivant (Formations)</button></a>
        
            </div>
        </div>
        </form>
        </section>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.js"></script>
    <script src="../assets/js/Profile-Edit-Form-profile.js"></script>
</body>

</html>