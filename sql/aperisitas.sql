-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 15 fév. 2018 à 13:48
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `aperisitas`
--

-- --------------------------------------------------------

--
-- Structure de la table `connect`
--

DROP TABLE IF EXISTS `connect`;
CREATE TABLE IF NOT EXISTS `connect` (
  `id_connect` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `numRue` int(11) DEFAULT NULL,
  `nomRue` varchar(50) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_connect`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connect`
--

INSERT INTO `connect` (`id_connect`, `login`, `mdp`, `firstName`, `lastName`, `email`, `numRue`, `nomRue`, `cp`, `ville`, `pays`) VALUES
(1, 'Bernardo', '1234', 'titi', 'Dupont', 'email', NULL, NULL, NULL, NULL, NULL),
(2, 'Bernar', '1234', 'titi', 'Dupont', 'titi.dupont@gmail.com', NULL, NULL, NULL, NULL, NULL),
(3, 'Bernuch', '1234', 'titi', 'Dupont', 'titi.dut@gmail.com', NULL, NULL, NULL, NULL, NULL),
(4, 'Bnuch', '1234', 'titi', 'Dupont', 'ti.dut@gmail.com', NULL, NULL, NULL, NULL, NULL),
(5, 'Babouch', '1234', 'titi', 'Dupont', 'ti.dut@ail.com', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_panier` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` int(11) DEFAULT NULL,
  `id_produit` int(11) NOT NULL,
  `id_connect` int(11) NOT NULL,
  PRIMARY KEY (`id_panier`,`id_produit`),
  KEY `FK_panier_id_produit` (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id_panier`, `nombre`, `id_produit`, `id_connect`) VALUES
(1, 20, 1, 5),
(2, 50, 3, 5),
(3, 50, 3, 5),
(4, 50, 3, 5),
(5, 50, 3, 5),
(6, 50, 3, 5),
(7, 50, 3, 5),
(8, 50, 3, 5),
(9, 50, 3, 5),
(10, 50, 3, 5),
(11, 50, 3, 5);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `saveur` varchar(50) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `url_img` varchar(50) DEFAULT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `saveur`, `stock`, `url_img`, `prix`) VALUES
(1, 'Jambon', 500, 'jambon.png', 5),
(2, 'High et Fines Herbes', 500, 'hfh.png', 6.5),
(3, 'Salade Tomate Oignon', 500, 'sto.png', 5.5),
(4, 'Cacahuète', 500, 'cacahuete.png', 4);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `FK_panier_id_produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
