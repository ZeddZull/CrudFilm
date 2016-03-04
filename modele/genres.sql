-- phpMyAdmin SQL Dump
-- version 4.4.2
-- http://www.phpmyadmin.net
--
-- Client :  servinfo-db
-- Généré le :  Ven 17 Avril 2015 à 10:58
-- Version du serveur :  5.5.41-MariaDB-1ubuntu0.14.04.1
-- Version de PHP :  5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `dbgerard`
--

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `code_genre` int(11) NOT NULL,
  `nom_genre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `genres`
--

INSERT INTO `genres` (`code_genre`, `nom_genre`) VALUES
(26, 'à l''antique                                       '),
(4, 'c''était demain                                    '),
(5, 'pas drôle mais beau                               '),
(6, 'pauvre espèce humaine                             '),
(10, 'jeu dans le jeu                                   '),
(15, 'poésie en image                                   '),
(11, 'en France profonde                                '),
(7, 'du rire aux larmes (et retour)                    '),
(28, 'docu                                              '),
(17, 'les chocottes à zéro                              '),
(19, 'la parole est d''or                                '),
(20, 'Paris                                             '),
(14, 'culte ou my(s)tique                               '),
(13, 'pour petits et grands enfants                     '),
(9, 'en avant la musique                               '),
(23, 'Los Angeles & Hollywood                           '),
(3, 'cadavre(s) dans le(s) placard(s)                  '),
(21, 'vive la (critique) sociale !                      '),
(22, 'épique pas toc                                    '),
(27, 'du Moyen-Age à 1914                               '),
(12, 'New-York                                          '),
(1, 'heurs et malheurs à deux                          '),
(30, 'Bollywooderie                                     '),
(16, 'conte de fées relooké                             '),
(25, 'entre Berlin et Moscou                            '),
(8, 'portrait d''époque (après 1914)                    '),
(2, 'carrément à l''ouest                               '),
(29, 'vers le soleil levant                             '),
(24, 'perle de nanard                                   ');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`code_genre`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `code_genre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
