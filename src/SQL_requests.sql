-- création des 6 comptes pour utiliser l'appli

INSERT INTO connexion (id, role, login, cypher, enabled) 
VALUES 
(1, 3, 'didrao', '$2y$10$AFyEe7dlMydr5v5vNIykuuRh330byJUazRVT11XusTugtAWXANItm', 1),
(2, 3, 'janliv', '$2y$10$OzqbY13v/zX.CFhinA9km.Cw96mTMAI18/n1lgFybJoiQrc6moqCC', 1),
(3, 3, 'gaerem', '$2y$10$FddiK7IqfdZbJENZlFkp6eGD6Y75SOvKacCrFof7.DWr3iKBiGTTG', 1),
(4, 1, 'karrel', '$2y$10$eNfG73dUDKCjeVoReo4vtepG3TRjqrrygqDXDMsV9e1U15pz7Tpp6', 1),
(5, 1, 'guegui', '$2y$10$eNfG73dUDKCjeVoReo4vtepG3TRjqrrygqDXDMsV9e1U15pz7Tpp6', 1),
(6, 2, 'admin', '$2y$10$P/OPryeSVUEIeTy2RW6FO.706e6.Fz9raGwGHioGesCKyFjSJKMCu', 1);

-- création de 3 médecins

INSERT INTO medecin (nom, prenom, mail, tel, bureau, id_medecin)
 VALUES 
('Raoult', 'Didier', 'raoult.didier@gmail.com', '02 99 25 67 40', 27, 1),
('Livoinier', 'Janine', 'livoinier.janine@aliceadsl.fr', '02 99 34 08 99', 5, 2),
('Remon', 'Gaétan', 'remon.gaetan@outlook.fr', '06 45 23 87 59', 14, 3);

-- création de 2 clients

INSERT INTO patient (nom, prenom, tel, mail, adresse, commentaire, id_patient, naissance)
 VALUES 
('Relou', 'Karen', '07 12 34 56 78', 'relou.karen@gmail.com', 'Pays des Merveilles', 'je veux parler au manager', 4, 28/02/1989),
('Guimonier', 'Guénolé', '06 22 74 78 31', 'guimonier.guenole@outlook.fr', 'Poudlard', 'merci !', 5, 09/09/1999);

-- création d'une secrétaire

--INSERT INTO medecin (nom, prenom, mail, tel, bureau, identifiant_medecin)
 --VALUES
--('Nourhi', 'Lanelle', 'nourhi.lanelle@centre_medical.fr', '02 99 36 57 21', 101, 7)
