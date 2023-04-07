<?php
session_start();

require ("./common/DB.inc.php");
include "./common/fctAux.inc.php";


enTete();
contenu();
pied();

function contenu() {
    echo "<div class=\"cardSlider\">\n";

    /*script insersion card Portfolio */
    cardPortfolio();

    echo "</div>\n";   
}

function cardPortfolio() {
    $db = DB::getInstance();
    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else {
        try {
            //interroge la base de données et récupère tous les portfolio d'un utilisateur
            $Portfolio = $db->getPortfolioByUser($_SESSION['id_utilisateur']);
            foreach($Portfolio as $row) {
                echo '
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card">
                        <a href="">
                            <img src="./images/user.png" class="card-img-top" alt="Image 2">
                            <div class="card-body">
                                <p class="card-text">'.$row['nomPortfolio'].'-'.$row['estPublic'].'</p>
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