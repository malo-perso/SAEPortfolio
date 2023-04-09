<?php
// Démarre la session
require ("./common/DB.inc.php");
ini_set('display_errors', 1);
session_start();

// Affecte une valeur à une clé de la session

// Affiche les valeurs de la session
echo 'Les valeurs de la session sont :';
echo '<pre>';
print_r($_SESSION);
echo '</pre>';
echo "______________________________________________________________";
$idPortfolio=2;
$idUser=$_SESSION['id_utilisateur'];
echo "idPortfolio : ".$idPortfolio."\n";
echo "idUser : ".$idUser."\n";


$db = DB::getInstance();
if ($db == null) {
    echo "Impossible de se connecter à la base de données !</br>";
}
else {
    echo "Connexion à la base de données réussie !</br>";
    if($db->isPublic($idPortfolio))
    {
        echo "Portfolio public</br>";
    }
    else
    {
        echo "Portfolio privé</br>";
    }
}

$db = DB::getInstance();
if ($db == null) {
    echo "Impossible de se connecter à la base de données !</br>";
}
else {
    if($db->isExiste($idPortfolio))
    {
        echo "Portfolio existe</br>";
    }
    else
    {
        echo "Portfolio n'existe pas</br>";
    }
}

$db = DB::getInstance();
if ($db == null) {
    echo "Impossible de se connecter à la base de données !</br>";
}
else {
    if($db->isProprietaire($idPortfolio, $idUser))
    {
        echo "propriétaire du Portfolio </br>";
    }
    else
    {
        echo "non propriétaire du Portfolio</br>";
    }
}



?>