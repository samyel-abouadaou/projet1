-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 19 Janvier 2017 à 11:49
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(19, 'Pantoufle'),
(20, 'Chaussure'),
(21, 'Talon'),
(22, 'Enfant');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `prenom`, `telephone`, `adresse`, `id_commande`, `pseudo`, `mdp`) VALUES
(1, 'Cipprioti', 'Loic', '0632658595', '3 rue des saucisses', 0, 'Loic', '1234');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_statut` int(11) NOT NULL DEFAULT '1',
  `prix_total` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `id_statut`, `prix_total`, `id_client`) VALUES
(1, 2, 103, 1);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

CREATE TABLE IF NOT EXISTS `ligne_commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_commande` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Contenu de la table `ligne_commande`
--

INSERT INTO `ligne_commande` (`id`, `id_commande`, `id_produit`) VALUES
(32, 1, 17),
(33, 1, 19),
(34, 1, 18),
(35, 1, 18),
(36, 1, 17),
(37, 1, 19);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prix` int(11) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `details` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `prix`, `id_categorie`, `details`) VALUES
(17, 'produit1', 15, 19, 'ksuverezverzv'),
(18, 'Produit2', 65, 20, 'zaerzaerzaefzaef '),
(19, 'produit3', 23, 19, 'afzaef'),
(20, 'produit4', 95, 21, 'zergtegeg'),
(21, 'produit5', 45, 22, 'erfzegaerg');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE IF NOT EXISTS `statut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `statut`
--

INSERT INTO `statut` (`id`, `nom`) VALUES
(1, 'non payé'),
(2, 'payé'),
(3, 'éxpédié');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
