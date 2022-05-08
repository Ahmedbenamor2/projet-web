-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 08 mai 2022 à 22:35
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_etudiant`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `id` int(11) NOT NULL,
  `nom` varchar(40) NOT NULL,
  `module` varchar(40) NOT NULL,
  `date` varchar(40) NOT NULL,
  `ampm` varchar(40) NOT NULL,
  `justifié` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

CREATE TABLE `enseignant` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nom` varchar(40) NOT NULL,
  `prenom` varchar(40) NOT NULL,
  `login` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`id`, `date`, `nom`, `prenom`, `login`, `pass`) VALUES
(1, '2022-05-05 14:25:01', 'ahmed', 'ben amor', 'ahmed@gmail.com', '594f803b380a41396ed63dca39503542'),
(2, '2022-05-05 14:40:55', 'ahmed', 'ben amar', 'ahmedbenamar123456@gmail.com', '594f803b380a41396ed63dca39503542'),
(3, '2022-05-07 21:59:03', 'oussama', 'bakali', 'oussi@gmail.com', '594f803b380a41396ed63dca39503542'),
(4, '2022-05-08 11:38:00', 'ahmed', 'ben amor ', 'ahmed3@gmail.com', '594f803b380a41396ed63dca39503542'),
(5, '2022-05-08 12:07:16', 'ben amor', 'ahmed', 'ahmed4@gmail.com', '594f803b380a41396ed63dca39503542');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `cin` int(8) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `cpassword` varchar(40) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `Classe` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`cin`, `email`, `password`, `cpassword`, `nom`, `prenom`, `adresse`, `Classe`) VALUES
(12345678, 'ahmedetu@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', '3dbe00a167653a1aaee01d93e77e730e', 'ben amor', 'ahmed', '     tunis', 'INFO1-E'),
(12346678, 'oussama@gmail.com', '3dbe00a167653a1aaee01d93e77e730e', '3dbe00a167653a1aaee01d93e77e730e', 'bakali', 'oussama', '     TUNIS', 'INFO1-E');

-- --------------------------------------------------------

--
-- Structure de la table `groupeetudiant`
--

CREATE TABLE `groupeetudiant` (
  `groupe` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `groupeetudiant`
--

INSERT INTO `groupeetudiant` (`groupe`) VALUES
('INFO1-B'),
('INFO2-B'),
('INFO2-D'),
('INFO2-C'),
('INFO1-C'),
('INFO1-C'),
('INFO1-A');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`cin`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `enseignant`
--
ALTER TABLE `enseignant`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
