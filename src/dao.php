<?php

function getPasswordUser($id){
    // Vérifie l'authentification : récupère le cypher à partir d'un identifiant de connexion
    $bdd = connexionPDO();
    $req = '
    SELECT cypher
    FROM connexion 
    WHERE identifiant = :id';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $person = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $person;
}

function getDataClient($id){
    // Récupère les données du client à partir de son id de connexion
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM client 
    INNER JOIN connexion ON client.identifiant_client = connexion.identifiant
    WHERE identifiant = :id';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $data;
}

function getDataMedecin($id){
    // Récupère les données du médecin à partir de son id de connexion
    $bdd = connexionPDO();
    $req = '
    SELECT * 
    FROM medecin 
    INNER JOIN connexion ON medecin.identifiant_medecin = connexion.identifiant
    WHERE identifiant = :id';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $data;
}

function updateClientInfo($nom, $prenom, $tel, $mail, $adresse, $com, $id){
    // Mise à jour d'information patient
    $bdd = connexionPDO();
    $req = '
    UPDATE client 
    SET (nom, prenom, tel, mail, adresse, commentaire, identifiant_client) = (:nom, :prenom, :tel, :mail, :adresse, :com, :id)
    WHERE identification_client = :id';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":nom",$nom,":prenom",$prenom, ":tel", $tel, ":mail", $mail, ":adresse", $adresse, ":com", $com,":id",$id, PDO::PARAM_STR);
    $stmt->execute();
    $update = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $update;
}

function updateMedInfo($nom, $prenom, $tel, $mail, $adresse, $com, $id){
    // Mise à jour d'information medecin
    $bdd = connexionPDO();
    $req = '
    UPDATE medecin 
    SET (nom, prenom, tel, mail, adresse, commentaire, identifiant_medecin) = (:nom, :prenom, :tel, :mail, :adresse, :com, :id)
    WHERE identification_medecin = :id';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":nom",$nom,":prenom",$prenom, ":tel", $tel, ":mail", $mail, ":adresse", $adresse, ":com", $com,":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $update = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $update;
}

function updateEnablement($num, $id){
    // Possibilité de disable : Update sur le champs enable
    if ($num = 0 or $num = 1) {
    $bdd = connexionPDO();
    $req = '
    UPDATE connexion 
    SET (enabled) = :num
    WHERE identifiant = :id';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":num",$num,":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $update = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $update;
    }
    else {
        echo "la nouvelle valeur de la variable enable doit être 0 ou 1."
    }
}

function getDataAllMedecin(){
    // Récupère la liste des médecins et leurs informations.
    $bdd = connexionPDO();
    $req = '
    SELECT *
    FROM medecin';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $data;
}

function getRdvClient($id){
    // Récupère la liste des rendez-vous d'un client
    $bdd = connexionPDO();
    $req = '
    SELECT *
    FROM rendez-vous
    WHERE identification_client = :id';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $rdv = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $rdv;
}

function getIndispMedecin($id){
    // Liste des créneaux indisponibles pour un médecin
    $bdd = connexionPDO();
    $req = '
    SELECT jour_debut, jour_fin, date, heure 
    FROM vacances, rendez-vous
    INNER JOIN rendez-vous ON vacances.id_medecin = rendez-vous.identifiant_medecin
    WHERE id_medecin = :id ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $creneaux = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $creneaux;
}

function AddRdv($id_client, $id_med, $date, $heure, $com, $id_rdv){
    // Ajoute un rendez-vous dans la table rendez-vous
    $bdd = connexionPDO();
    $req = '
    INSERT INTO rendez-vous (identifiant_client, identifiant_medecin, date, heure, commentaire, id_rendez_vous) 
    VALUES (:id_client, :id_med, :date, :heure, :com, :id_rdv)';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":id_client",$id_client,":id_med",$id_med,":date",$date,":heure",$heure,":com",$com,":id_rdv",$id_rdv,PDO::PARAM_STR);
    $stmt->execute();
    $newrdv = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $newrdv;
}