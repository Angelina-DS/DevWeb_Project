<?php
require_once "pdo.php";

function getPasswordUser($login){
    // Vérifie l'authentification : récupère le cypher à partir d'un identifiant de connexion
    $bdd = connexionPDO();
    $req = '
    SELECT cypher
    FROM connexion 
    WHERE login = :login';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":login",$login,PDO::PARAM_STR);
    $stmt->execute();
    $password = $stmt->fetch(PDO::FETCH_ASSOC)['cypher'];
    $stmt->closeCursor();
    return $password;
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

function getRole($id){
    // Récupère le rôle dans la table connexion à l'aide du login
    $bdd = connexionPDO();
    $req = '
    SELECT role
    FROM connexion 
    WHERE id = :id';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":id",$id,PDO::PARAM_STR);
    $stmt->execute();
    $role = $stmt->fetch(PDO::FETCH_ASSOC)['role'];
    $stmt->closeCursor();
    return $role;
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
    $cypher = getPasswordUser($login);
    if ($cypher ){
        return password_verify($password,$cypher);
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

function getDoctors() {
    $bdd = connexionPDO();
    $req = 'SELECT * FROM medecin';
    $stmt = $bdd->exec($req);
    $medecins = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $medecins;
}

function getRendezVous($id_patient) {
    $bdd = connexionPDO();
    $req = 'SELECT * FROM rendez_vous WHERE id_patient = :id_patient';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":id_patient",$id_patient,PDO::PARAM_INT);
    $stmt->execute();
    $medecins = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $medecins;
}

function makeRendezVous($id_patient,$id_medecin,$date,$heure,$commentaire) {
    $bdd = connexionPDO();
    $req = 'INSERT INTO rendez_vous VALUES(NULL,:id_patient,:id_medecin,:id_date,:id_heure,:id_commentaire)';
    $stmt = $bdd->prepare($req);
    $donnees = ['id_patient' => $id_patient, 
                'id_medecin' => $id_medecin, 
                'date' => $date, 
                'heure' => $heure, 
                'commentaire' => $commentaire];
    $stmt->execute($donnees);
    $medecins = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $medecins;
    
}

function getHorairesMedecin($id_medecin) {
    $bdd = connexionPDO();
    $req = 'SELECT * FROM horaire WHERE id_medecin = :id_medecin';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":id_medecin",$id_medecin,PDO::PARAM_INT);
    $stmt->execute();
    $horaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $horaires;
}

function getHorairesMedecinJour($id_medecin,$jour) {
    $bdd = connexionPDO();
    $req = 'SELECT * FROM horaire WHERE id_medecin = :id_medecin AND jour = :jour';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":id_medecin",$id_medecin,PDO::PARAM_INT);
    $stmt->bindValue(":jour",$jour,PDO::PARAM_INT);
    $stmt->execute();
    $horaires = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $horaires;
}

function getCreneaux($jour,$id_medecin,$debut_matin,$fin_matin,$debug_aprem,$fin_aprem,$duree_creneau) {
    $debut = "test";
}

function getCreneauxMedecinJour($id_medecin,$date) {
    $bdd = connexionPDO();
    $req = 'SELECT * FROM rendez_vous WHERE id_medecin = :id_medecin AND date = :date';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":id_medecin",$id_medecin,PDO::PARAM_INT);
    $stmt->bindValue(":date",$date,PDO::PARAM_STRING);
    $stmt->execute();
    $creneaux  = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $creneaux;
}


function testCreneaux() {
    $begin = new DateTime('2022-04-03');
    $end = new DateTime('2022-04-10');
    $interval = DateInterval::createFromDateString('1 day');
    $period = new DatePeriod($begin, $interval, $end);

    foreach ($period as $dt) {
        echo $dt->format("w\n");
        echo $dt->format("Y-m-d\n");
        print_r (getCreneauxMedecinJour(12,$dt->format("Y-m-d")));
    }
    $horairesMedecinJour = getHorairesMedecinJour(12,1);

    return($horairesMedecinJour);
}
