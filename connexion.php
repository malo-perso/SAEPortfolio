<?php
ini_set('display_errors', 1);
require ("./common/DB.inc.php");
include "./common/fctAux.inc.php";

enTete();
contenu();
pied();

function contenu(){

     if(isset($_GET['authentification'])) {
          $action = $_GET['authentification'];
          if($action == 'login') {
               // Afficher le formulaire de connexion
               login();
          } elseif ($action == 'register') {
               // Afficher le formulaire d'inscription
               register();
          }
     }
     else{ //si l'utilisateur est sur la page de connexion sans avoir cliqué sur le bouton connexion
          header('Location: connexion.php?authentification=login');
     }
}

function login(){
     echo "     <div class=\"container justify-content-center\">\n";
     echo "         <div id=\"login-row\" class=\"row justify-content-center align-items-center\">\n";
     echo "             <div id=\"login-column\" class=\"col-md-6 col-xs-12\">\n";
     echo "                 <div id=\"login-box\" class=\"col-md-12\">\n";
     echo "                     <form id=\"login-form\" class=\"form\" action=\"\" method=\"post\">\n";
     echo "                         <h3 class=\"text-center text-info\">Connexion</h3>\n";
     echo "                         <div class=\"form-group row mb-4\">\n";
     echo "                             <label for=\"username\" class=\"col-sm-2 col-form-label text-info\">Login:</label>\n";
     echo "                             <div class=\"col-sm-10\">\n";
     echo "                                  <input type=\"text\" name=\"username\" id=\"username\" class=\"form-control\">\n";
     echo "                             </div>\n";
     echo "                         </div>\n";
     echo "                         <div class=\"form-group row mb-4\">\n";
     echo "                             <label for=\"password\" class=\"col-sm-2 col-form-label text-info\">Password:</label>\n";
     echo "                             <div class=\"col-sm-10\">\n";
     echo "                                  <input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\">\n";
     echo "                             </div>\n";
     echo "                        </div>                      \n";
     echo "                         <div class=\"form-group d-flex justify-content-between align-items-center mb-4\">\n";
     echo "                             <div class=\"form-check\">\n";
     echo "                                 <label for=\"remember-me\" class=\"form-check-label text-info\">Remember me</label>\n";
     echo "                                 <input id=\"remember-me\" name=\"remember-me\" type=\"checkbox\" class=\"form-check-input\">\n";
     echo "                             </div>\n";
     echo "                             <div>\n";
     echo "                                 <a href=\"connexion.php?authentification=register\" class=\"text-info\">Register here</a>";
     echo "                             </div>\n";
     echo "                         </div>                              \n";
     echo "                         <div class=\"form-group text-center\">\n";
     echo "                             <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\">Connexion</button>\n";
     echo "                         </div>\n";
     echo "                     </form>\n";
     echo "                </div>\n";
     echo "             </div>\n";
     echo "         </div>\n";
     echo "     </div>\n";
}

function register(){
     echo "     <div class=\"container justify-content-center\">\n";
     echo "         <div id=\"login-row\" class=\"row justify-content-center align-items-center\">\n";
     echo "             <div id=\"login-column\" class=\"col-md-6 col-xs-12\">\n";
     echo "                 <div id=\"login-box\" class=\"col-md-12\">\n";
     echo "                    <form id=\"login-form\" class=\"form\" action=\"\" method=\"post\">\n";
     echo "                    <h3 class=\"text-center text-info\">Register</h3>\n";
     echo "                    <div class=\"form-group row mb-4\">\n";
     echo "                         <label for=\"username\" class=\"col-sm-2 col-form-label text-info\">Mail:</label>\n";
     echo "                         <div class=\"col-sm-10\">\n";
     echo "                         <input type=\"text\" name=\"username\" id=\"username\" class=\"form-control\">\n";
     echo "                        </div>\n";
     echo "                   </div>\n";
     echo "                    <div class=\"form-group row mb-4\">\n";
     echo "                         <label for=\"username\" class=\"col-sm-2 col-form-label text-info\">Username:</label>\n";
     echo "                   <div class=\"col-sm-10\">\n";
     echo "                         <input type=\"text\" name=\"username\" id=\"username\" class=\"form-control\">\n";
     echo "                         </div>\n";
     echo "                    </div>\n";
     echo "                    <div class=\"form-group row mb-4\">\n";
     echo "                         <label for=\"username\" class=\"col-sm-2 col-form-label text-info\">Password:</label>\n";
     echo "                         <div class=\"col-sm-10\">\n";
     echo "                         <input type=\"text\" name=\"username\" id=\"username\" class=\"form-control\">\n";
     echo "                         </div>\n";
     echo "                   </div>\n";
     echo "                    <div class=\"form-group text-center\">\n";
     echo "                         <button type=\"submit\" name=\"submit\" class=\"btn btn-primary\">Créer Compte</button>\n";
     echo "                    </div>\n";
     echo "                    </form>\n";
     echo "                </div>\n";
     echo "             </div>\n";
     echo "         </div>\n";
     echo "     </div>\n";
}
$db = DB::getInstance();
if ($db == null) {
     echo "Impossible de se connecter à la base de données !\n";
}
else {
     try {
          if(isset($_POST['submit'])){
               $login = $_POST['username'];
               $mdp = $_POST['password'];
               echo $login." ".$mdp;

               if(emailValide($login) && motDePasseValide($mdp)){
                    if($db->isemailOK($login) && $db->isMotDePasseOK($login,$mdp)){
                         //remplir les informations de l'utilisateur dans la session
                         echo "Login et mot de passe correct";
                         $nom = $db->getNom($login);
                         $prenom = $db->getPrenom($login);
                         var_dump($nom);
                         var_dump($prenom);
                         $_SESSION['nom_utilisateur'] = $nom;
                         $_SESSION['prenom_utilisateur'] = $prenom;
                         $_SESSION['email'] = $login;
                         header('Location: index.php');
                    }
                    else{
                         echo "Login ou mot de passe incorrect";
                    }
               }
               else{
                    echo "Login ou mot de passe non valide";
               }
          }
     } //fin try
     catch (Exception $e) {
          echo $e->getMessage();
     }
$db->close();
}

?>