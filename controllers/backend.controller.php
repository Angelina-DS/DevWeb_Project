<?php
require_once "public/utile/formatage.php"; 
require_once "config/config.php";
require_once "models/admin.dao.php";


function getPageLogin(){
    $title = "Page de login du site";
    $description = "Page de login";

    if(Securite::verificationAccess()){
        header ("Location: admin");
    }
    $alert = "";
    if(isset($_POST['login']) && !empty($_POST['login']) &&
    isset($_POST['password']) && !empty($_POST['password'])){
        $login = Securite::secureHTML($_POST['login']);
        $password = Securite::secureHTML($_POST['password']);
        if(isConnexionValid($login,$password)){
            $_SESSION['acces'] = getRole($login);
            Securite::genereCookiePassword();
            header ("Location: admin");
        } else {
            $alert = "Mot de passe invalide";
            $_SESSION['acces'] = "admin";
            Securite::genereCookiePassword();
            header ("Location: admin");
        }
    }

    require_once "views/back/login.view.php";
}

function getPageAdmin(){
    if(isset($_POST['deconnexion']) && $_POST['deconnexion'] === "true"){
        session_destroy();
        header("Location: accueil");
    }

    if(Securite::verificationAccess()){
        Securite::genereCookiePassword();
        $title = "Page d'administration du site";
        $description = "Page d'administration du site";

        require_once "views/back/adminAccueil.view.php";
    } else {
        throw new Exception("Vous n'avez pas le droit d'accéder à cette page");
    }
}

function getPageInscription(){
    $title = "Page d'inscription au site";
    $description = "Page d'inscription";

    //if(Securite::verificationAccess()){
    //    header ("Location: admin");
    //}
    $alert = "";

    if(isset($_POST['nom']) && !empty($_POST['nom']) &&
    isset($_POST['prenom']) && !empty($_POST['prenom']) &&
    isset($_POST['date_naissance']) && !empty($_POST['date_naissance']) &&
    isset($_POST['pseudo']) && !empty($_POST['pseudo']) &&
    isset($_POST['password']) && !empty($_POST['password']) &&
    isset($_POST['password_retype']) && !empty($_POST['password_retype']) &&
    isset($_POST['email']) && !empty($_POST['email']) &&
    isset($_POST['telephone']) && !empty($_POST['telephone']) &&
    isset($_POST['adresse']) && !empty($_POST['adresse'])){

        $nom = Securite::secureHTML($_POST['nom']);
        $prenom = Securite::secureHTML($_POST['prenom']);
        $date_naissance = Securite::secureHTML($_POST['date_naissance']);
        $login = Securite::secureHTML($_POST['pseudo']);
        $password = Securite::secureHTML($_POST['password']);
        $password_retype = Securite::secureHTML($_POST['password_retype']);
        $mail = Securite::secureHTML($_POST['email']);
        $tel = Securite::secureHTML($_POST['telephone']);
        $adresse = Securite::secureHTML($_POST['adresse']);


        if($password != $password_retype){
            $alert = "Les mots de passes saisis ne correspondent pas";
            require_once "views/back/inscription.php";
        } else if (isNewPseudoValid($login)== false){
            $alert = "Le pseudo est déjà utilisé";
            require_once "views/back/inscription.php";
        }
        else {
            //Pour créer le compte dans la table connexion
            $enabled = 1 ;
            $role = 1;
            setCompteConnexion($role, $login, $password, $enabled);

            //Pour créer le compte dans la table patient
            $id = getIdUserByLogin($login);
            $commentaire = "No comment";
            setComptePatient($id, $nom, $prenom, $tel, $mail, $adresse,  $date_naissance , $login , $password, $commentaire);

            require_once "views/back/login.view.php";

        }


    }


    require_once "views/back/inscription.php";
}