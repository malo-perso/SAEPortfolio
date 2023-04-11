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
     echo "                             <button type=\"submit\" name=\"login\" class=\"btn btn-primary\">Connexion</button>\n";
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
     echo "                    <form id=\"register-form\" class=\"form\" action=\"\" method=\"post\">\n";
     echo "                    <h3 class=\"text-center text-info\">Register</h3>\n";
     echo "                    <div class=\"form-group row mb-4\">\n";
     echo "                         <label for=\"email\" class=\"col-sm-2 col-form-label text-info\">Email:</label>\n";
     echo "                         <div class=\"col-sm-10\">\n";
     echo "                         <input type=\"email\" name=\"email\" id=\"email\" class=\"form-control\">\n";
     echo "                        </div>\n";
     echo "                   </div>\n";
     echo "                    <div class=\"form-group row mb-4\">\n";
     echo "                         <label for=\"firstname\" class=\"col-sm-2 col-form-label text-info\">First Name:</label>\n";
     echo "                   <div class=\"col-sm-10\">\n";
     echo "                         <input type=\"text\" name=\"firstname\" id=\"firstname\" class=\"form-control\">\n";
     echo "                         </div>\n";
     echo "                    </div>\n";
     echo "                    <div class=\"form-group row mb-4\">\n";
     echo "                         <label for=\"lastname\" class=\"col-sm-2 col-form-label text-info\">Last Name:</label>\n";
     echo "                   <div class=\"col-sm-10\">\n";
     echo "                         <input type=\"text\" name=\"lastname\" id=\"lastname\" class=\"form-control\">\n";
     echo "                         </div>\n";
     echo "                    </div>\n";
     echo "                    <div class=\"form-group row mb-4\">\n";
     echo "                         <label for=\"password\" class=\"col-sm-2 col-form-label text-info\">Password:</label>\n";
     echo "                         <div class=\"col-sm-10\">\n";
     echo "                         <input type=\"password\" name=\"password\" id=\"password\" class=\"form-control\">\n";
     echo "                         </div>\n";
     echo "                   </div>\n";
     echo "                    <div class=\"form-group row mb-4\">\n";
     echo "                         <label for=\"confirm_password\" class=\"col-sm-2 col-form-label text-info\">Confirm Password:</label>\n";
     echo "                         <div class=\"col-sm-10\">\n";
     echo "                         <input type=\"password\" name=\"confirm_password\" id=\"confirm_password\" class=\"form-control\">\n";
     echo "                         </div>\n";
     echo "                   </div>\n";
     echo "                    <div class=\"form-group text-center\">\n";
     echo "                         <button type=\"submit\" name=\"register\" class=\"btn btn-primary\">Create Account</button>\n";
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
          if(isset($_POST['login'])){
               $login = $_POST['username'];
               $mdp = $_POST['password'];
               echo $login." ".$mdp;

               if(emailValide($login) && motDePasseValide($mdp))
               {
                    //$mdp = password_hash($mdp, PASSWORD_DEFAULT);
                    
                    if($db->isemailOK($login) && $db->isMotDePasseOK($login,$mdp)){
                         //remplir les informations de l'utilisateur dans la session

                         //$id = $IdUser->getIdUser();
                         echo "Login et mot de passe correct";
                         $nom = $db->getNom($login);
                         $prenom = $db->getPrenom($login);
                         
                         $_SESSION['nom_utilisateur'] = $nom;
                         $_SESSION['prenom_utilisateur'] = $prenom;
                         $_SESSION['email'] = $login;
                         $IdUser = $db->getUserID($login);
                         $_SESSION['id_utilisateur'] = $IdUser->getIdUser();

                         header('Location: accueilSite.php');
                    }
                    else{
                         echo "Login ou mot de passe incorrect";
                    }
               }
               else{
                    echo "Login ou mot de passe non valide";
               }
          }
          if(isset($_POST['register'])){
               $email = $_POST['email'];
               $firstname = $_POST['firstname'];
               $lastname = $_POST['lastname'];
               $password = $_POST['password'];
               $confirm_password = $_POST['confirm_password'];

               // Vérifie si tous les champs ont été remplis
               if (empty($email) || empty($firstname) || empty($lastname) || empty($password) || empty($confirm_password)) {
                    echo "<p class='error'>Veuillez remplir tous les champs.</p>";
                    return;
               }

               if(emailValide($email) && motDePasseValide($password)){
                    // Vérifie si l'adresse email est déjà utilisée
                    if ($db->isemailOK($email)) {
                         echo "<p class='error'>L'adresse email est déjà utilisée.</p>";
                         return;
                    }
                    else{
                         // Vérifie si les mots de passe sont identiques
                         if ($password != $confirm_password) {
                              echo "<p class='error'>Les mots de passe ne sont pas identiques.</p>";
                              return;
                         }
                         else{

                              $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                              $db->addUser($email, $firstname, $lastname, $hashed_password);
                              echo "Utilisateur ajouté";

                              header('Location: connexion.php');
     
                         }
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