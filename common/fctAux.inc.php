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

    function pied() {
        echo '</body>
        </html>';
    }

?>