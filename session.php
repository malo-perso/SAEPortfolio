<?php
// Démarre la session
session_start();

// Affecte une valeur à une clé de la session

// Affiche les valeurs de la session
echo 'Les valeurs de la session sont :';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
?>
