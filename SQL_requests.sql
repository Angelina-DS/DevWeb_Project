
-- Vérifier authentification : récupérer le cypher à partir dun identifiant de connexion.
SELECT cypher FROM 'connexion' WHERE identifiant = id

-- Récupérer données patients : récupère les données de la personne à partir de son id de connexion
SELECT * FROM 'client' INNER JOIN 'connexion' ON client.identifiant_client = connexion.identifiant

-- Récupérer données médecin : récupère les données de la personne à partir de son id de connexion
SELECT * FROM 'medecin' INNER JOIN 'connexion' ON medecin.identifiant_medecin = connexion.identifiant

-- Mise à jour d'information patient : Fournis toutes les info patient et tu les écris dans la base
UPDATE 'client' SET (nom, prenom, tel, mail, adresse, commentaire, identifiant_client) =  ('DENIS-SIMONI', 'Angelina', '06.95.17.59.86', 'angelina@aliceadsl.fr', '9 rue des pins 34570 Pignan', 'commentaire', 1586 ) WHERE identifiant_client = id

-- Mise à jour d'information medecin : Fournis toutes les info médecin et tu les écris dans la base
UPDATE 'medecin' (nom, prenom, tel, mail, adresse, commentaire, identifiant_medecin) = ('DENIS-SIMONI', 'Angelina', '06.95.17.59.86', 'angelina@aliceadsl.fr', '9 rue des pins 34570 Pignan', 'commentaire', 1586 ) WHERE identifiant_medecin = id

-- Possibilité de disable : Update sur le champs enabled 
UPDATE 'connexion' (enabled) = (0) -- ou (1)
-- entrée : id utilisateur -> sortie update la valeur d'enable en 0 (disabled) ou 1 (enabled)

-- Récupérer la liste des médecins et leurs informations.
SELECT * FROM 'medecin'

-- Récupérer la liste des rendez vous d'un patient 
SELECT * FROM 'rendez_vous' WHERE identifiant_client = id

-- La liste des créneaux d'un médecin disponibles (jour exacte, heure de début, heure de fin x2 sur tous les jours pour une semaine donnée (entre 2 dates) pour un docteur (jointure avec les vacances pour exclure les vacances)

-- Liste des créneaux indisponibles pour un médecin
SELECT 'jour_debut', 'jour_fin', 'date', 'heure' FROM 'vacances' WHERE id_medecin = id INNER JOIN 'rendez-vous' ON vacances.id_medecin = rendez-vous.identifiant_medecin

-- Ajouter un rendez vous
INSERT INTO 'rendez-vous' (identifiant_client, identifiant_medecin, date, heure, commentaire, id_rendez_vous) VALUES (id1, id2, 29/03/2022, 15h42, 'commentaire', id3) 
