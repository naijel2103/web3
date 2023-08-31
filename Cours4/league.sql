-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 31 Août 2023 à 20:59
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `league`
--

-- --------------------------------------------------------

--
-- Structure de la table `personnages`
--

CREATE TABLE `personnages` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `region` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Contenu de la table `personnages`
--

INSERT INTO `personnages` (`id`, `nom`, `image`, `region`, `role`) VALUES
(1, 'Zeri', 'https://64.media.tumblr.com/d129854ec22dfa101c0c9f35bdab169a/45a28c3cd4c6384c-c2/s540x810/7af3a2c43371a840868ea9ee36f0daf5df509cfb.jpg', 'Zaun', 'Adc'),
(2, 'yasuo', 'https://descargas.ams3.digitaloceanspaces.com/images/2576/yasuo_icon_windows.png', 'Ionia', 'MID'),
(3, 'Yone', 'https://www.mobafire.com/images/champion/square/yone.png', 'Ionia', 'TOP'),
(4, 'Fiddlesticks', 'https://vignette.wikia.nocookie.net/vsbattles/images/7/72/Fiddlesticks_OriginalSkin.jpg/revision/latest?cb=20200323012739', 'RUNETERRA', 'Jungle');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `personnages`
--
ALTER TABLE `personnages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `personnages`
--
ALTER TABLE `personnages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
