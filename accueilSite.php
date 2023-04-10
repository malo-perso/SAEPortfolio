<?php
session_start();

require ("./common/DB.inc.php");
include "./common/fctAux.inc.php";

if (isset($_GET["visibility"])){
    $idPortfolio = $_GET['idPortfolio'];
    $visibility = $_GET['visibility'];

    //si la visibilité est true, on la passe à false
    if ($visibility == "true") {
        $visibility = 0;
    } else {
        $visibility = 1;
    }

    // Mettre à jour la visibilité du portfolio dans la base de données
    $db = DB::getInstance();
    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else {
        $db->setVisible($idPortfolio, $visibility);
    }
}
if (isset($_GET["deletePortfolio"])){
    $idPortfolio = $_GET['deletePortfolio'];
    $db = DB::getInstance();
    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else {
        $db->removePortfolio($idPortfolio);
    
    }
}
if (isset($_GET["Portfolio"])){
    $db = DB::getInstance();
    if ($db == null) {
        echo "Impossible de se connecter à la base de données !\n";
    }
    else {
        //echo $_SESSION['id_utilisateur'];
        $db->addPortfolio($_SESSION['id_utilisateur']);

    }
}

enTete();
contenu();
pied();

function contenu() {
    echo    '<div class=\"new-Portfolio\">;
                <form method="get" action="./accueilSite.php" style="none">
                    <input type="hidden" name="Portfolio" value="new">
                    <button type="submit" style="border: none; href="./accueilSite.php">
                        Nouveau Portfolio<img class="card-footer-img" src="./images/add.png" alt="visibilite False">
                    </button>
                </form>
            </div>';
    echo "<div class=\"card\">";
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
                            <a href="./Portfolio/consultAccueil.php?idPortfolio='.$row->getidportfolio().'">
                                <img src="./images/user.png" class="card-img-top" alt="Image 2">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row->getnomportfolio().'</h5>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <a href="./Portfolio/editAccueil.php?idPortfolio='.$row->getidportfolio().'&action=edit""><img class="card-footer-img" id="edit" src="./images/edit.png" alt="editPortfolio"></a>
                                    <form method="get" action="./accueilSite.php" style="none">';
                                        if ($row->getestpublic() == 1) {
                                        echo '<input type="hidden" name="idPortfolio" value="'.$row->getidportfolio().'">
                                              <input type="hidden" name="visibility" value="true">
                                              <button type="submit" style="border: none; href="./accueilSite.php">';
                                            echo '<img class="card-footer-img" src="./images/visibiliteTrue.png" alt="visibilite True">';
                                        } else {
                                        echo '<input type="hidden" name="idPortfolio" value="'.$row->getidportfolio().'">
                                              <input type="hidden" name="visibility" value="false">
                                              <button type="submit" style="border: none; href="./accueilSite.php">';
                                            echo '<img class="card-footer-img" src="./images/visibiliteFalse.png" alt="visibilite False">';
                                        }
                    echo '              </button>
                                    </form>
                                    <form method="get" action="./accueilSite.php" style="none">
                                        <input type="hidden" name="deletePortfolio" value="'.$row->getidportfolio().'">
                                        <button type="button" style="border: none; href="./accueilSite.php " onclick="confirmDelete('.$row->getidportfolio().')">
                                            <img class="card-footer-img" src="./images/delete.png" alt="delete">
                                        </button>

                                        <script>
                                            function confirmDelete(id) {
                                                if (confirm("Êtes-vous sûr de vouloir supprimer ce portfolio ?")) {
                                                    window.location.href = "accueilSite.php?deletePortfolio=" + id;
                                                }
                                            }
                                        </script>

                                    </form>
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
<script>
document.querySelector("#edit").addEventListener("click", function() {
    // Crée un objet FormData contenant la valeur de l'action
    console.log("edit");
    var formData = new FormData();
    formData.append("action", "modifier");

    // Envoie une requête POST au serveur
    fetch("./Portfolio/Accueil.php", {
        method: "POST",
        body: formData
    })
    .then(function(response) {
        if (response.ok) {
            // Réponse OK
        } else {
            // Erreur
        }
    })
    .catch(function(error) {
        // Erreur de connexion
    });
});


</script>
