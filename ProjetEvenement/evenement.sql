-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 04 Octobre 2023 à 18:42
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `evenement`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `idEntreprise` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `contentEtu` int(11) NOT NULL,
  `neutreEtu` int(11) NOT NULL,
  `mecontentEtu` int(11) NOT NULL,
  `contentEmp` int(11) NOT NULL,
  `neutreEmp` int(11) NOT NULL,
  `mecontentEmp` int(11) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`idEntreprise`, `nom`, `description`, `contentEtu`, `neutreEtu`, `mecontentEtu`, `contentEmp`, `neutreEmp`, `mecontentEmp`, `departement`, `date`, `lieu`) VALUES
(1, 'ewqe', 'eewq', 6, 2, 1, 0, 0, 0, 'Techniques policieres', '2023-08-30', 'ewq'),
(2, '123', '31', 0, 0, 0, 0, 0, 0, 'Technologie de la mecanique industrielle', '2023-09-25', '321'),
(3, 'eqwe', 'ewq', 0, 0, 0, 0, 0, 0, 'eqweqwe', '2023-08-29', 'weqwq'),
(5, '32131', '32131', 0, 0, 0, 0, 0, 0, 'dep1', '2023-09-07', '321312');

-- --------------------------------------------------------

--
-- Structure de la table `usager`
--

CREATE TABLE `usager` (
  `id` int(11) NOT NULL,
  `usager` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Contenu de la table `usager`
--

INSERT INTO `usager` (`id`, `usager`, `email`, `password`, `ip`) VALUES
(1, 'Loick', 'loick.michaud2103@gmail.com', 'lol', '172.68.82.168'),
(2, 'fjifjwp', 'test@gmail.com', 'accc9105df5383111407fd5b41255e23', '172.16.1.2');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`idEntreprise`);

--
-- Index pour la table `usager`
--
ALTER TABLE `usager`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usager` (`usager`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `idEntreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `usager`
--
ALTER TABLE `usager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
