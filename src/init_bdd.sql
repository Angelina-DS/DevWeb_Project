-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 28 mars 2022 à 17:21
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de données : `projetdev`
--
-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `id` int(11) NOT NULL,
  `role` enum('1','2','3') DEFAULT NULL,
  `login` varchar(16) NOT NULL,
  `cypher` varchar(64) NOT NULL,
  `enabled` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

CREATE TABLE `patient` (
  `id_patient` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `tel` varchar(32) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `naissance` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE `medecin` (
  `id_medecin` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `tel` varchar(32) NOT NULL,
  `bureau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Structure de la table `horaire`
--

CREATE TABLE `horaire` (
  `id_horaire` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `jour` int(11) NOT NULL,
  `debut_matin` time NOT NULL,
  `fin_matin` time NOT NULL,
  `debut_aprem` time NOT NULL,
  `fin_aprem` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE `rendez_vous` (
  `id_rendez_vous` int(11) NOT NULL,
  `id_patient` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `commentaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `vacances`
--

CREATE TABLE `vacances` (
  `id_vacances` int(11) NOT NULL,
  `id_medecin` int(11) NOT NULL,
  `jour_debut` date NOT NULL,
  `jour_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id_patient`);

--
-- Index pour la table `patient`
--
ALTER TABLE `medecin`
  ADD PRIMARY KEY (`id_medecin`);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD PRIMARY KEY (`id_horaire`);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD PRIMARY KEY (`id_rendez_vous`);

--
-- Index pour la table `vacances`
--
ALTER TABLE `vacances`
  ADD PRIMARY KEY (`id_vacances`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `connexion`
--
ALTER TABLE `horaire`
  MODIFY `id_horaire` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  MODIFY `id_rendez_vous` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `vacances`
--
ALTER TABLE `vacances`
  MODIFY `id_vacances` int(11) NOT NULL AUTO_INCREMENT;

--
-- FOREIGN_KEY pour les tables déchargées
--

--
-- Index pour la table `patient`
--
ALTER TABLE `patient`
  ADD FOREIGN KEY (id_patient) REFERENCES connexion(id);

--
-- Index pour la table `patient`
--
ALTER TABLE `medecin`
  ADD FOREIGN KEY (id_medecin) REFERENCES connexion(id);

--
-- Index pour la table `horaire`
--
ALTER TABLE `horaire`
  ADD FOREIGN KEY (id_medecin) REFERENCES medecin(id_medecin);

--
-- Index pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD FOREIGN KEY (id_patient) REFERENCES patient(id_patient),
  ADD FOREIGN KEY (id_medecin) REFERENCES medecin(id_medecin);

--
-- Index pour la table `vacances`
--
ALTER TABLE `vacances`
  ADD FOREIGN KEY (id_medecin) REFERENCES medecin(id_medecin);