-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 20 Décembre 2017 à 10:03
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `todolist`
--
CREATE DATABASE IF NOT EXISTS `todolist` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `todolist`;

-- --------------------------------------------------------

--
-- Structure de la table `listetacheprive`
--

CREATE TABLE `listetacheprive` (
  `nom` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `listetachepublic`
--

CREATE TABLE `listetachepublic` (
  `nom` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE `tache` (
  `nom` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `lieu` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `id_tache` int(10) NOT NULL,
  `id_liste` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `tache`
--

INSERT INTO `tache` (`nom`, `description`, `date`, `lieu`, `id_tache`, `id_liste`) VALUES
('medecin', 'rdv pour la gorge', '2017-12-16', 'Les Ã©lites', 2, 0),
('blablacar', 'rdv covoiturage', '2017-12-15', 'rue de nexon', 3, 0),
('manger', 'ne pas oublier', '2017-12-27', 'cuisine', 5, 0),
('passer aspirateur', 'ne pas oublier de vider le sac', '2017-12-13', 'maison', 6, 0),
('changer les rideaux', 'ne pas oublier !!!', '2017-12-20', 'salle de bain', 8, 0),
('courses', 'acheter lait ', '2017-12-21', 'Casino geant ', 15, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tacheprive`
--

CREATE TABLE `tacheprive` (
  `nom` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `description` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `lieu` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_tache` int(10) NOT NULL,
  `login` varchar(30) NOT NULL,
  `id_listeprive` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `tacheprive`
--

INSERT INTO `tacheprive` (`nom`, `description`, `date`, `lieu`, `id_tache`, `login`, `id_listeprive`) VALUES
('matacheprive', 'ma description prive', '2017-12-11', 'Clermont', 1, 'yannis', 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `login` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `mdp` varchar(300) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`login`, `mdp`) VALUES
('yann', '$2y$10$YE8ODtL7v7gv4leYB0mfCu3KwhTmufYMH7kRjZrvFXS/Bzs2MmdB.'),
('hello', '$2y$10$yviImJVildCOPN9VDrIw8.w8WniHbwP8YIHgjOEUIP4t4zpzQMktC');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `listetacheprive`
--
ALTER TABLE `listetacheprive`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`login`);

--
-- Index pour la table `listetachepublic`
--
ALTER TABLE `listetachepublic`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tache`
--
ALTER TABLE `tache`
  ADD PRIMARY KEY (`id_tache`),
  ADD KEY `id_liste` (`id_liste`);

--
-- Index pour la table `tacheprive`
--
ALTER TABLE `tacheprive`
  ADD PRIMARY KEY (`id_tache`),
  ADD KEY `FK_login` (`login`),
  ADD KEY `id_listeprive` (`id_listeprive`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `listetacheprive`
--
ALTER TABLE `listetacheprive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `listetachepublic`
--
ALTER TABLE `listetachepublic`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tache`
--
ALTER TABLE `tache`
  MODIFY `id_tache` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `tacheprive`
--
ALTER TABLE `tacheprive`
  MODIFY `id_tache` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
