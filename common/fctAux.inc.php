<?php

    function motDePasseValide($mdp) {
        $patterne = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{8,}$/';
        return preg_match($patterne, $mdp);
    }

    function emailValide($email) {
        $patterne = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/';
        return preg_match($patterne, $email);
    }

    function entete($titre) {
        echo '<!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="utf-8">
            <title>'.$titre.'</title>
        </head>
        <body>';
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
        echo "            <button class=\"btn btn-primary float-end my-3\" href=\"#\">Connexion</button>\n";
        echo "        </div>\n";
        echo "    </div>\n\n";
        echo "    <div class=\"container my-5\">\n";
        echo "      <div class=\"d-flex justify-content-center\">\n";
        echo "          <img src=\"./images/logo.png\" alt=\"Logo\" width=\"150\" height=\"150\">\n";
        echo "          <h1 class=\"ms-4\">ARAM </br>Portfolio</h1>\n";
        echo "      </div>\n";
    }

    function pied() {
        echo '</body>
        </html>';
    }

?>