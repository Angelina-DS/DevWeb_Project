<?php
require_once "pdo.php";

function getPasswordUser($id){
    // Vérifie l'authentification : récupère le cypher à partir d'un identifiant de connexion
    $bdd = connexionPDO();
    $req = '
    SELECT cypher
    FROM connexion 
    WHERE id = :id';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $person = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $person;
}

function getLogin($login){
    // Vérifie si un login est déjà dans la base
    $bdd = connexionPDO();
    $req = '
    SELECT *
    FROM connexion 
    WHERE login = :login';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":login",$login,PDO::PARAM_STR);
    $stmt->execute();
    $person = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $person;
}

function isConnexionValid($login,$password){
    $person = getPasswordUser($login);
    if ($person ){
        return password_verify($password,$person['password']);
    }
    return(false);
}

function isNewPseudoValid($login){
    $person = getLogin($login);
    if ($person){
        return False;
    }
    return(True);
}