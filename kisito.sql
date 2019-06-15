-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 15 juin 2019 à 09:19
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `kisito`
--

-- --------------------------------------------------------

--
-- Structure de la table `consultation`
--

DROP TABLE IF EXISTS `consultation`;
CREATE TABLE IF NOT EXISTS `consultation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `heure` datetime NOT NULL,
  `Observation` longtext COLLATE utf8_unicode_ci,
  `Temperature` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tension` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Poids` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Controle` datetime DEFAULT NULL,
  `prescription` longtext COLLATE utf8_unicode_ci,
  `analyses` longtext COLLATE utf8_unicode_ci,
  `diagnostic` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_964685A66B899279` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `consultation`
--

INSERT INTO `consultation` (`id`, `patient_id`, `date`, `heure`, `Observation`, `Temperature`, `Tension`, `Poids`, `Controle`, `prescription`, `analyses`, `diagnostic`) VALUES
(1, 14, '2018-06-01 07:13:17', '2018-06-01 07:13:17', 'fievre', '37.00', '117/63', '50.00', '2018-06-01 00:00:00', 'Helicidine sirop: 1 matin 1 midi 1 soir', NULL, NULL),
(2, 15, '2018-03-06 08:18:07', '2018-03-06 08:18:07', 'Fièvre', '37.00', '117/63', '45.00', NULL, 'Doliprane 250 g: 1matin 1midi 1 soir\r\n\r\nStimol: 1Matin 1 soir', NULL, NULL),
(3, 14, '2018-03-21 13:23:17', '2018-03-21 13:23:17', NULL, '20.00', '10', '10.00', NULL, 'Doliprane Sirop: 1Matin 1Midi 1soir\r\nCa-C100:1/jour', NULL, NULL),
(5, 14, '2018-03-21 13:31:58', '2018-03-21 13:31:58', 'fièvre', '10.00', '10', '10.00', NULL, 'CA-C1000: 1M 1M 1S', NULL, NULL),
(6, 15, '2018-05-28 07:12:47', '2018-05-28 07:12:47', 'migraine', '37.00', '117/63', '50.00', '2018-06-10 00:00:00', 'ca c1000: 1/jour', NULL, NULL),
(7, 14, '2018-06-01 07:06:33', '2018-06-01 07:06:33', NULL, NULL, NULL, NULL, '2018-06-11 00:00:00', NULL, NULL, NULL),
(10, 14, '2018-06-18 08:15:20', '2018-06-18 08:15:20', NULL, '12*', NULL, '12kg', '2018-12-10 00:00:00', NULL, NULL, NULL),
(12, 14, '2019-06-15 09:09:50', '2019-06-15 09:09:50', 'qwqw', '20.00', '12', '12', '2019-06-16 00:00:00', 'wewe', 'qwq', 'wewe');

-- --------------------------------------------------------

--
-- Structure de la table `controle`
--

DROP TABLE IF EXISTS `controle`;
CREATE TABLE IF NOT EXISTS `controle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `heure` datetime NOT NULL,
  `diagnostic` longtext COLLATE utf8_unicode_ci,
  `Observation` longtext COLLATE utf8_unicode_ci,
  `prescription` longtext COLLATE utf8_unicode_ci,
  `analyses` longtext COLLATE utf8_unicode_ci,
  `Temperature` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tension` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Poids` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_F74F5B386B899279` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `controle`
--

INSERT INTO `controle` (`id`, `patient_id`, `date`, `heure`, `diagnostic`, `Observation`, `prescription`, `analyses`, `Temperature`, `Tension`, `Poids`) VALUES
(2, 14, '2018-06-18 07:21:09', '2018-06-18 07:21:09', NULL, NULL, NULL, NULL, '10*', '12/32', '12kg'),
(3, 34, '2018-06-19 08:55:26', '2018-06-19 08:55:26', NULL, NULL, NULL, NULL, '10*', '12/32', '12kg');

-- --------------------------------------------------------

--
-- Structure de la table `fos_user`
--

DROP TABLE IF EXISTS `fos_user`;
CREATE TABLE IF NOT EXISTS `fos_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'kisito', 'kisito', 'kisito@gmail.com', 'kisito@gmail.com', 1, NULL, '$2y$13$E7TF38WnHhJfhuA0cDJl1eKNZpDe3MlKI9khqizijywQT3oCunxv.', '2019-06-15 08:37:25', NULL, NULL, 'a:0:{}');

-- --------------------------------------------------------

--
-- Structure de la table `hospitalisation`
--

DROP TABLE IF EXISTS `hospitalisation`;
CREATE TABLE IF NOT EXISTS `hospitalisation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `Entree` date NOT NULL,
  `Sortie` date DEFAULT NULL,
  `Temperature` decimal(10,2) DEFAULT NULL,
  `Poids` decimal(10,2) DEFAULT NULL,
  `Tension` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Chambre` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Lit` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Diagnostic` longtext COLLATE utf8_unicode_ci,
  `Traitement` longtext COLLATE utf8_unicode_ci,
  `Analyse` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_67C059596B899279` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `hospitalisation`
--

INSERT INTO `hospitalisation` (`id`, `patient_id`, `Entree`, `Sortie`, `Temperature`, `Poids`, `Tension`, `Chambre`, `Lit`, `Diagnostic`, `Traitement`, `Analyse`) VALUES
(2, 15, '2018-05-28', '2018-05-28', '38.00', '45.00', '11/27', '1', 'a', 'paludisme', 'serum', NULL),
(3, 29, '2019-06-15', '2019-06-15', '15.00', '12.00', '12', '11', '12', 'wewe', 'wewe', 'wewe'),
(4, 34, '2019-06-15', '2019-06-15', '11.00', '12.00', '23', 'we', 'wew', 'wewe', 'wewe', 'wewe');

-- --------------------------------------------------------

--
-- Structure de la table `maladie`
--

DROP TABLE IF EXISTS `maladie`;
CREATE TABLE IF NOT EXISTS `maladie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Prenom` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adresse` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexe` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Groupe_sanguin` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NomPrenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Age` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `antecedant` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `patient`
--

INSERT INTO `patient` (`id`, `Nom`, `Prenom`, `adresse`, `telephone`, `sexe`, `Groupe_sanguin`, `NomPrenom`, `Age`, `antecedant`) VALUES
(14, 'TSAKPO', 'Emmanuel', 'Lomé-TOGO', '98882471', 'M', 'B+', 'TSAKPO   Emmanuel', '10', 'Drépanocitaire'),
(15, 'YOVO', 'maruis', 'Lomé-TOGO', '93643336', 'M', 'B-', 'YOVO   maruis', '20', 'Hépathite'),
(27, 'manue', 'ella', NULL, NULL, 'F', NULL, 'manue   ella', NULL, NULL),
(28, 'joel', 'eric', NULL, '90982221', 'F', NULL, 'joel   eric', '35', NULL),
(29, 'TSAKPO', 'josephine', NULL, NULL, 'F', NULL, 'TSAKPO   josephine', '21', NULL),
(30, 'TSAKPO', 'Pelagie', NULL, NULL, 'F', NULL, 'TSAKPO   Pelagie', '16', NULL),
(31, 'TCHALIM', 'Basile', NULL, NULL, 'M', NULL, 'TCHALIM   Basile', NULL, 'sideen'),
(34, 'DIDIER', 'Drogba', NULL, NULL, 'M', NULL, 'DIDIER   Drogba', '40', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `etat` int(11) NOT NULL,
  `heure` datetime DEFAULT NULL,
  `motif` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_10C31F866B899279` (`patient_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id`, `patient_id`, `date`, `etat`, `heure`, `motif`) VALUES
(1, 15, '2018-06-01 00:00:00', 1, '1970-01-01 09:00:00', 'Fièvre'),
(6, 14, '2019-06-15 00:00:00', 1, NULL, 'controle'),
(7, 27, '2019-06-20 00:00:00', 0, '1970-01-01 10:00:00', 'test');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `FK_964685A66B899279` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`);

--
-- Contraintes pour la table `controle`
--
ALTER TABLE `controle`
  ADD CONSTRAINT `FK_F74F5B386B899279` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`);

--
-- Contraintes pour la table `hospitalisation`
--
ALTER TABLE `hospitalisation`
  ADD CONSTRAINT `FK_67C059596B899279` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `FK_10C31F866B899279` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
