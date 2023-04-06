<?php
session_start();

if(isset($_SESSION["nom_utilisateur"])){
    echo "Bonjour " .$_SESSION["nom_utilisateur"]. ", bienvenue sur notre site !\n";
}

// Affiche les données stockées dans la session
echo "Votre nom est : " . $_SESSION['nom_utilisateur'] . "<br>";
echo "Votre prenom est : " . $_SESSION['prenom_utilisateur'] . "<br>";
echo "Votre email est : " . $_SESSION['email'] . "<br>";

?>