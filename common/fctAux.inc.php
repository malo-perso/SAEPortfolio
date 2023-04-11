<?php
ini_set('display_errors', 1);
session_start();

function isUserConnected() {
    if (isset($_SESSION["nom_utilisateur"]) && isset($_SESSION["prenom_utilisateur"])) {
        echo "<button class=\"btn btn-primary float-end my-3\" href=\"#\">" . $_SESSION["nom_utilisateur"] . " " . $_SESSION["prenom_utilisateur"] . "</button>\n"; 
    } else {
        echo "<a href=\"connexion.php?authentification=login\" class=\"btn btn-primary float-end my-3\">Connexion</a>";
    }
}

function enTete() {
    echo "<!DOCTYPE html>\n";
    echo "<html>\n";
    echo "    <head>\n";
    echo "        <title>Bienvenue sur mon site</title>\n";
    echo "        <meta name=\"viewport\" content=\"width=device-width\, initial-scale=1.0\">\n";
    echo "        <meta charset=\"UTF-8\">\n";
    echo "        <meta name=\"Content-Language\" content=\"fr\">\n";
    echo "        <link href=\"./style/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\" media=\"all\" type=\"text/css\">\n";
    echo "        <link href=\"./style/style.css\" rel=\"stylesheet\" media=\"all\" type=\"text/css\">\n";
    echo "        <link href=\"./style/slick/slick-theme.css\" rel=\"stylesheet\" type=\"text/css\"/>\n";
    echo "        <link href=\"./style/slick/slick.css\" rel=\"stylesheet\" type=\"text/css\"/>\n\n";
    echo "        <script src=\"https://code.jquery.com/jquery-3.6.0.min.js\"></script>\n";
    echo "        <script src=\"./style/bootstrap/js/bootstrap.bundle.min.js\"></script>\n";
    echo "        <script src=\"./style/bootstrap/js/bootstrap.min.js\"></script>\n";
    echo "        <script type=\"text/javascript\" src=\"./style/slick/slick.min.js\"></script>\n\n";
    echo "        <script type=\"text/javascript\" src=\"./style/script.js\"></script>\n";

    echo "    </head>\n";
    echo "<body class=\"container-fluid bg-img-blur\">\n\n";
    echo "    <div class=\"container my-5\">\n";
    echo "      <div class=\"d-flex justify-content-center\">\n";
    echo "          <img src=\"./images/logo.png\" alt=\"Logo\" width=\"150\" height=\"150\">\n";
    echo "          <h1 class=\"ms-4\">ARAM </br>Portfolio</h1>\n";
    echo "      </div>\n";
}


function enTeteIndex() {
    echo "<!DOCTYPE html>\n";
    echo "<html>\n";
    echo "    <head>\n";
    echo "        <title>Bienvenue sur mon site</title>\n";
    echo "        <meta name=\"viewport\" content=\"width=device-width\, initial-scale=1.0\">\n";
    echo "        <meta charset=\"UTF-8\">\n";
    echo "        <meta name=\"Content-Language\" content=\"fr\">\n";
    echo "        <link href=\"./style/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\" media=\"all\" type=\"text/css\">\n";
    echo "        <link href=\"./style/style.css\" rel=\"stylesheet\" media=\"all\" type=\"text/css\">\n";
    echo "        <link href=\"./style/slick/slick-theme.css\" rel=\"stylesheet\" type=\"text/css\"/>\n";
    echo "        <link href=\"./style/slick/slick.css\" rel=\"stylesheet\" type=\"text/css\"/>\n\n";
    echo "        <script src=\"https://code.jquery.com/jquery-3.6.0.min.js\"></script>\n";
    echo "        <script src=\"./style/bootstrap/js/bootstrap.bundle.min.js\"></script>\n";
    echo "        <script src=\"./style/bootstrap/js/bootstrap.min.js\"></script>\n";
    echo "        <script type=\"text/javascript\" src=\"./style/slick/slick.min.js\"></script>\n\n";
    echo "        <script type=\"text/javascript\" src=\"./style/script.js\"></script>\n";

    echo "    </head>\n";
    echo "<body class=\"container-fluid bg-img-blur\">\n\n";
    echo "    <div class=\"row\">\n";
    echo "        <div class=\"col-12\">\n";

    isUserConnected();

    echo "        </div>\n";
    echo "    </div>\n\n";
    echo "    <div class=\"container my-5\">\n";
    echo "      <div class=\"d-flex justify-content-center\">\n";
    echo "          <img src=\"./images/logo.png\" alt=\"Logo\" width=\"150\" height=\"150\">\n";
    echo "          <h1 class=\"ms-4\">ARAM </br>Portfolio</h1>\n";
    echo "      </div>\n";
}

function pied() {
    echo '</body>';
    echo '</html>';
}

function motDePasseValide($mdp) {
    $patterne = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{8,}$/';
    return preg_match($patterne, $mdp);
}

function emailValide($email) {
    $patterne = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/';
    return preg_match($patterne, $email);
}

function gestionAcces(){

    if(isset($_GET["idPortfolio"])){
        //récupération de l'id du portfolio
        $idPortfolio = $_GET["idPortfolio"];

        $db = DB::getInstance();
        if ($db == null) {
            echo "Impossible de se connecter à la base de données !\n";
        }
        else {
            if($db->isExiste($idPortfolio)){
                //portfolio existe dans db
                if(isset($_GET["mode"]) && $_GET["mode"] == "edit"){
                    // Mode modification
                    if(isset($_SESSION["email"]) && $_SESSION["id_utilisateur"]){
                        // Utilisateur connecté
                        if ($db->isProprietaire($idPortfolio, $_SESSION["id_utilisateur"])){
                            // Utilisateur propriétaire du portfolio
                            return true;
                        }
                        else{
                            // Utilisateur non propriétaire du portfolio => redirection page d'accueil utiliateur 
                            return false;
                        }
                    }
                    else{
                        // utilisateur non connecté => redirection page connexion
                            // possible de refaire revenir ici après connexion avec $_SESSION["redirect"] = $_SERVER["REQUEST_URI"]; 
                        header("Location: ../connexion.php");
                        return false;
                    }
                }
                else{
                    // Mode consultation
                    // Vérifier si le portfolio est public
                    if($db->isPublic($idPortfolio)){
                        //portfolio public
                        return true; // Accès autorisé
                    }
                    else {
                        //portfolio privé
                        if(isset($_SESSION["email"]) && $_SESSION["id_utilisateur"]){
                            // Utilisateur connecté
                            if ($db->isProprietaire($idPortfolio, $_SESSION["id_utilisateur"])){
                                // Utilisateur propriétaire du portfolio
                                return true;
                            }
                            else{
                                // Utilisateur non propriétaire du portfolio => redirection page d'accueil utiliateur 
                                return false;
                            }
                        }else{
                            // utilisateur non connecté => redirection page connexion
                                // possible de refaire revenir ici après connexion avec $_SESSION["redirect"] = $_SERVER["REQUEST_URI"]; 
                            header("Location: ../connexion.php");
                            return false;
                        }
                    }
                }
            }
            else{
                //portfolio n'existe pas dans db
            }
        }
    }
    else{
        //pas d'idPortfolio rediriger vers page d'accueil
        header("location: ../index.php");
    }
}

?>