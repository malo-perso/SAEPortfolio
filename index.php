<?php
ini_set('display_errors', 1);

require ("./common/DB.inc.php");
include "./common/fctAux.inc.php";


enTeteIndex();
contenu();
pied();

function contenu() {
    echo "<form class=\"my-4\" action =\"\" method=\"GET\">\n";
    echo "    <div class=\"input-group\">\n";
    echo "        <input name=\"recherche\" type=\"search\" class=\"form-control\" placeholder=\"Recherche\">\n";
    echo "        <button class=\"btn btn-primary\" type=\"submit\">Rechercher</button>\n";
    echo "    </div>\n";
    if(isset($_SESSION['email'])){

        echo "<div class=\"d-flex justify-content-center mt-2\">\n";
            echo "<a href=\"./accueilSite.php\" class=\"btn btn-primary\">Mes portfolios !</a>\n";
        echo "</div>\n";
        
    }
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
        if (isset($_GET['recherche'])) {
            $recherche = $_GET['recherche'];
            $recherche = trim($recherche); 
            $recherche = strip_tags($recherche);

            $idPortfolio = $db->getIdPortfolio($recherche);
    
            if ($idPortfolio == -1 || $idPortfolio == null || $idPortfolio == "" || $idPortfolio == 0) {
                echo "<script>console.log('portfolio inexistant');</script>";
            }
            else
            {
                foreach ($idPortfolio as $row) {
                    if($db->isPublic($row)) {
                        $user = $db->getUserByPortfolio($row);
                        echo '
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card">
                                <a href="./Portfolio/consultAccueil.php?idPortfolio='.$row.'">
                                    <img src="./images/user.png" class="card-img-top" alt="Image 2">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$user['nom'].'-'.$user['prenom'].'</h5>
                                    </div>
                                </a>
                            </div>
                        </div>';
                    }
                }
            }
        }
        else {
            try {
                //interroge la base de données et récupère tous les utilisateurs qui ont un portfolio pub
                $users = $db->getUserPortfolioPublie();
                foreach($users as $row) {
                    //if($db->isPublic($idPortfolio['idPortfolio'])) {
                        echo '
                        <div class="col-lg-3 col-md-6 mb-4">
                            <div class="card">
                                <a href="">
                                    <img src="./images/user.png" class="card-img-top" alt="Image 2">
                                    <div class="card-body">
                                        <h5 class="card-title">'.$row['nom'].'-'.$row['prenom'].'</h5>
                                    </div>
                                </a>
                            </div>
                        </div>';
                   //}
                }

            } //fin try
            catch (Exception $e) {
                echo $e->getMessage();
            }
        }  
        //$db->close();
} //fin du else connexion reussie




}

/*if (isset($_GET['recherche'])) {
    $recherche = $_GET['recherche'];
    $recherche = trim($recherche); 
    $recherche = strip_tags($recherche);

    $db = DB::getInstance();
    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else 
    {
        echo "<script>console.log('connexion reussie');</script>";
        $idPortfolio = $db->getIdPortfolio($recherche);

        if ($idPortfolio == -1 || $idPortfolio == null || $idPortfolio == "" || $idPortfolio == 0) {
            echo "<script>console.log('portfolio inexistant');</script>";
        }
        else
        {

            if($db->isPublic($idPortfolio)) {
                echo "<script>console.log('portfolio public');</script>";
                header("Location: ./Portfolio/consultAccueil.php?idPortfolio=".$idPortfolio);
            }
            else {
                echo "<script>console.log('portfolio prive');</script>";
            }
        }
        
    }
}*/

?>
