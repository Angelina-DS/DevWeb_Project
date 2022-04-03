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

function getIdUserByLogin($login){
    // Récupère l'id du compte dans la table connexion en utilisant le pseudo
    $bdd = connexionPDO();
    $req = '
    SELECT id
    FROM connexion 
    WHERE login = :login';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":login",$login,PDO::PARAM_STR);
    $stmt->execute();
    $id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];
    $stmt->closeCursor();
    return $id;
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

function setCompteConnexion($role, $login, $password, $enabled){
    $bdd = connexionPDO();
    $req = ' 
    INSERT INTO connexion (role, login, cypher, enabled) VALUES (:role, :login, :cypher, :enabled);';
    $stmt = $bdd->prepare($req);
    $cypher = password_hash($password, PASSWORD_DEFAULT);
    $donnees = ['role' => $role,
                'login' => $login, 
                'cypher' => $cypher, 
                'enabled' => $enabled,];
    $stmt->execute($donnees);
    $stmt->closeCursor();

}

function setComptePatient($id_patient, $nom, $prenom, $tel, $mail, $adresse , $commentaire, $naissance){
    $bdd = connexionPDO();
    $req = '
    INSERT INTO patient (id_patient, nom, prenom, tel, mail, adresse, commentaire, naissance) VALUES (:id_patient, :nom, :prenom, :tel, :mail, :adresse, :commentaire, :naissance)';
    $stmt = $bdd->prepare($req);
    $donnees = ['id_patient' => $id_patient, 
                'nom' => $nom, 
                'prenom' => $prenom, 
                'tel' => $tel, 
                'mail' => $mail, 
                'adresse' => $adresse, 
                'commentaire' => $commentaire,
                'naissance' => $naissance];
    $stmt->execute($donnees);
    $stmt->closeCursor();

}

function isConnexionValid($login,$password){
    $id = getIdUserByLogin($login);
    $person = getPasswordUser($id);
    if ($person){
        return password_verify($password,$person['cypher']);
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

function getRole($id) {
    $bdd = connexionPDO();
    $req = '
    SELECT role
    FROM connexion
    WHERE id = :id';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    $person = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $person["role"];

}