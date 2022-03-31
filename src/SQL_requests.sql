
-- création de 3 médecins 

INSERT INTO medecin (nom, prenom, mail, tel, bureau, identifiant_medecin)
 VALUES 
('Raoult', 'Didier', 'raoult.didier@gmail.com', '02 99 25 67 40', 27, 1)
('Livoinier', 'Janine', 'livoinier.janine@aliceadsl.fr', '02 99 34 08 99', 5, 2)
('Remon', 'Gaétan', 'remon.gaetan@outlook.fr', '06 45 23 87 59', 14, 3)

-- création de 2 clients

INSERT INTO client (nom, prenom, tel, mail, commentaire, identifiant_client, naissance)
 VALUES 
('Relou', 'Karen', '07 12 34 56 78', 'relou.karen@gmail.com', 'je veux parler au manager', 4, 28/02/1989)
('Guimonier', 'Guénolé', '06 22 74 78 31', 'guimonier.guenole@outlook.fr', 'merci !', 5, 09/09/1999)

-- création d'une secrétaire

INSERT INTO medecin (nom, prenom, mail, tel, bureau, identifiant_medecin)
 VALUES
('Nourhi', 'Lanelle', 'nourhi.lanelle@centre_medical.fr', '02 99 36 57 21', 101, 6)
