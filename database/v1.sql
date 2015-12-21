-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 15 Décembre 2015 à 22:02
-- Version du serveur: 5.5.46-0ubuntu0.14.04.2
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `elections`
--

-- --------------------------------------------------------

--
-- Structure de la table `candidate`
--

CREATE TABLE IF NOT EXISTS `candidate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_election` int(11) NOT NULL,
  `value` text NOT NULL,
  `group` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `election`
--

CREATE TABLE IF NOT EXISTS `election` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` tinytext NOT NULL,
  `admin_surname` tinytext NOT NULL,
  `admin_email` tinytext NOT NULL,
  `admin_password` tinytext NOT NULL,
  `business` tinytext NOT NULL,
  `winners` int(11) NOT NULL,
  `title` tinytext NOT NULL,
  `page` text NOT NULL,
  `start` datetime NOT NULL,
  `end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `elector`
--

CREATE TABLE IF NOT EXISTS `elector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_election` int(11) NOT NULL,
  `name` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `surname` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` tinytext NOT NULL,
  `public_id` tinytext NOT NULL,
  `voted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Structure de la table `security`
--

CREATE TABLE IF NOT EXISTS `security` (
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `IP` varchar(15) NOT NULL,
  `user_agent` tinytext NOT NULL,
  `session_id` varchar(50) NOT NULL,
  `session` tinytext NOT NULL,
  `url` tinytext NOT NULL,
  `action` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE IF NOT EXISTS `vote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_election` int(11) NOT NULL,
  `fingerprint` tinytext NOT NULL,
  `vote` tinytext NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vote` (`vote`(128))
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



-- --------------------------------------------------------


ALTER TABLE `security` ADD `weight` INT NOT NULL DEFAULT '1';

