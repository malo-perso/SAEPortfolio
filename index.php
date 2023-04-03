<?php
ini_set('display_errors', 1);


require ("DB.inc.php");
include "fctAux.inc.php";


enTeteIndex();
contenu();
pied();

function contenu() {
    echo "<form class=\"my-4\">\n";
    echo "    <div class=\"input-group\">\n";
    echo "        <input type=\"text\" class=\"form-control\" placeholder=\"Recherche\">\n";
    echo "        <button class=\"btn btn-primary\" type=\"submit\">Rechercher</button>\n";
    echo "    </div>\n";
    echo "</form>\n";
    echo "<div class=\"cardSlider\">\n";

/*script insersion card profil */
    cardUser();

    echo "</div>\n";   
}

function cardUser() {
    $db = DB::getInstance();
if ($db == null) {
    echo "Impossible de se connecter à la base de données !\n";
}
else {
    try {
        //interroge la base de données et récupère tous les utilisateurs qui ont un portfolio publié
        $users = $db->getUserPortfolioPublie();
        foreach($users as $row) {
            echo '
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <a href="">
                        <img src="./images/user.png" class="card-img-top" alt="Image 2">
                        <div class="card-body">
                            <h5 class="card-title">'.$row['nom'].'-'.$row['prenom'].'</h5>
                            <p class="card-text">Métier 3</p>
                        </div>
                    </a>
                </div>
            </div>';
        }

    } //fin try
    catch (Exception $e) {
        echo $e->getMessage();
    }  
    $db->close();
} //fin du else connexion reussie




}

?>