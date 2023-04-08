<?php
session_start();

require ("./common/DB.inc.php");
include "./common/fctAux.inc.php";


enTete();
contenu();
pied();

function contenu() {
    echo "<div class=\"card\">\n";
    //$IdUser = $db->getUserID('user1@mail.com');
    //echo "idUser : $IdUser";

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
            $resultats = $db->getPortfolioByUser($_SESSION['id_utilisateur']);
            if (!empty($resultats)) {
                echo "<p style=\"color: white;\">" .count($resultats) . " portfolio(s) trouvé(s) : </p>\n";
                foreach($resultats as $row) {
                    echo '
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card">
                            <a href="./Portfolio/Accueil.php?idPortfolio='.$row->getidportfolio().'">
                                <img src="./images/user.png" class="card-img-top" alt="Image 2">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row->getnomportfolio().'-'.$row->getestpublic().'</h5>
                                </div>
                            </a>
                        </div>
                    </div>';
                }
            } else {
                echo "Aucun portfolio trouvé";
            }
        } //fin try
        catch (Exception $e) {
            echo $e->getMessage();
        }  
        $db->close();
} //fin du else connexion reussie
}
?>
