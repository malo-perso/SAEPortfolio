<!DOCTYPE html>
<html lang="fr">

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="text-start">
    <div id="nav" style="width: 15%;background: #e7e4df;border-style: solid;border-color: var(--color-brown);position: fixed;height: 100%"> </div>

    <script>
            window.addEventListener('DOMContentLoaded', function() 
            {   
                var para = window.location.search;
                if (para.includes("action=edit"))
                {
                    var result = getNav("CVResume.php", "edit",para);
                }
                else{
                    var result = getNav("CVResume.php", "consult",para);
                }
                
                //var result = getNav("CVResume.php", "CV");
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
                                <a href="editCoordonnee.php" style="color: var(--color-brown)">
                                    <button class="btn btn-primary" type="button" style="margin-left: 0px;margin-right: 15px;margin-top: 15px;color: var(--color-brown);background: var(--bs-btn-disabled-color);border-color: var(--color-brown);">
                                        Modifier le CV</button>
                                </a>
                                    <button id="sauvegarder" class="btn btn-primary" type="button" style="margin-top: 15px;margin-right: 15px;border-color: var(--color-brown);background: var(--bs-btn-disabled-color);color: var(--color-brown);">Sauvegarder le CV</button>
                                    <button id="choixTemplate" class="btn btn-primary" type="button" style="margin-top: 15px;color: var(--color-brown);background: var(--bs-btn-disabled-color);border-color: var(--color-brown);">Choisir une Template</button>
                            </div>
                        </div>
                    </div>
                
                    <div id="templates" style="border:1px var(--color-brown) solid; display:none;">

                        <div style="background-color: var(--color-brown); color: var(--color-white);">
                            <h3 style="text-align: center; padding:1%; margin-bottom:2%;">Choisissez une template </h3>
                        </div>

                        <div class="row" style="margin-left:20%; margin-bottom:2%">
                            <div id="tmpl1" class="col-6">
                                <h3>Template 1</h3>
                                <img src="../images/template1.png" id="img1" alt="Template 1" style="width:40%; ">
                            </div>
                            <div id="tmpl2" class="col-6">
                                <h3>Template 2</h3>
                                <img src="../images/template2.png" id="img2" alt="Template 2" style="width:40%; ">
                            </div>
                        </div>
                        <div id="couleur" class="col-4" style="margin-left: 45%;">
                            <h3>Couleur</h3>
                            <input type="color" id="favcolor" name="favcolor" value="#ff0000">
                        </div>
                    </div>
            </div>
    </div>
    
    
    <script>
        
        tmpl1 = document.getElementById("img1");
        tmpl2 = document.getElementById("img2");
        resume = document.getElementById("resume");
        var tpl = "";
        var coul = "";
        //event listener for the button
        document.getElementById("choixTemplate").addEventListener("click", function() {

            //get the div
            var div = document.getElementById("templates");
            if(div.style.display === "none")
            {
                div.style.display = "block";

                tmpl1.addEventListener("click", function() {
                    console.log("Template 1");
                    tmpl1.style.border = "2px solid var(--color-brown)";
                    tmpl2.style.border = "none";
                    tpl = "CV1.tpl"
                });

                tmpl2.addEventListener("click", function() {
                    console.log("Template 2");
                    tmpl2.style.border = "2px solid var(--color-brown)";
                    tmpl1.style.border = "none";
                    tpl = "CV2.tpl"
                });
                        
                console.log("Choisissez une template");
                coul = document.getElementById("favcolor");
            }
            else
            {
                div.style.display = "none";
                
                console.log(coul.value);
                console.log("Cacher");
            }
        });

        document.getElementById("sauvegarder").addEventListener("click", function() {

            if(tpl != "" && coul != "")
            {
                console.log("Sauvegarder le CV");
                var j = jQuery.noConflict();
                j.ajax({
                    url: "consultCV.php",
                    type: "POST",
                    data: { tpl: tpl, couleur:coul.value },
                    success: function(response) {
                    }
                    
                });
            }

            else
            {
                console.log("Veuillez choisir une template et une couleur");
            }
            console.log(tpl);
            console.log(coul.value);

            });

    </script>

    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/Pop-Out-Vertical-Nav-w-Footer--Social-Links--1-Vertical-Nav.js"></script>
    <script src="../assets/js/Profile-Edit-Form-profile.js"></script>
</body>

</html>