-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 28 mars 2022 à 15:42
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestm`
--

-- --------------------------------------------------------

--
-- Structure de la table `attribuer`
--

DROP TABLE IF EXISTS `attribuer`;
CREATE TABLE IF NOT EXISTS `attribuer` (
  `id_attr` int(4) NOT NULL AUTO_INCREMENT,
  `idEmploye` int(5) DEFAULT NULL,
  `empl_conserner` int(5) DEFAULT NULL,
  `services` varchar(20) DEFAULT NULL,
  `filtre_dem` varchar(11) DEFAULT NULL,
  `mate_dem` varchar(30) DEFAULT NULL,
  `date_debut` date DEFAULT NULL,
  `date_fin` date DEFAULT NULL,
  `date_emi` datetime DEFAULT NULL,
  `existe` varchar(3) DEFAULT 'oui',
  `date_tr` datetime DEFAULT NULL,
  `commentaire` text CHARACTER SET utf8 DEFAULT NULL,
  `justificatif` text DEFAULT NULL,
  `idProjet` int(5) DEFAULT NULL,
  `idmateriel` int(5) DEFAULT NULL,
  `model` varchar(10) DEFAULT NULL,
  `status` int(1) DEFAULT 0,
  `user_connect` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_attr`),
  KEY `id_Projet` (`idProjet`),
  KEY `id_Employe` (`idEmploye`),
  KEY `id_materiel` (`idmateriel`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `attribuer`
--

INSERT INTO `attribuer` (`id_attr`, `idEmploye`, `empl_conserner`, `services`, `filtre_dem`, `mate_dem`, `date_debut`, `date_fin`, `date_emi`, `existe`, `date_tr`, `commentaire`, `justificatif`, `idProjet`, `idmateriel`, `model`, `status`, `user_connect`) VALUES
(1, NULL, 3, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, 'travail', 1, 6, NULL, 3, NULL),
(2, NULL, 3, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, 'test', 2, 4, NULL, 3, NULL),
(3, NULL, 71, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 1, 1, NULL, 1, NULL),
(4, NULL, 61, NULL, 'IMPRIMANTE', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 3, 99, NULL, 1, NULL),
(5, NULL, 75, NULL, 'IMPRIMANTE', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 5, 103, NULL, 1, NULL),
(6, NULL, 63, NULL, 'IMPRIMANTE', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 4, 100, NULL, 1, NULL),
(7, NULL, 55, NULL, 'IMPRIMANTE', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 4, 101, NULL, 1, NULL),
(8, NULL, 31, NULL, 'IMPRIMANTE', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 4, 102, NULL, 1, NULL),
(9, NULL, 43, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 1, 2, NULL, 1, NULL),
(10, NULL, 10, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 1, 5, NULL, 3, NULL),
(11, NULL, 36, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 1, 6, NULL, 1, NULL),
(12, NULL, 18, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 1, 7, NULL, 3, NULL),
(13, NULL, 54, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 1, 4, NULL, 1, NULL),
(14, NULL, 30, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 1, 9, NULL, 1, NULL),
(15, NULL, 9, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 1, 8, NULL, 1, NULL),
(16, NULL, 29, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 1, 12, NULL, 3, NULL),
(17, NULL, 61, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 1, 14, NULL, 1, NULL),
(18, NULL, 36, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 16, NULL, 1, NULL),
(19, NULL, 25, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 19, NULL, 1, NULL),
(20, NULL, 42, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 20, NULL, 1, NULL),
(21, NULL, 27, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 21, NULL, 1, NULL),
(22, NULL, 51, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 23, NULL, 1, NULL),
(23, NULL, 6, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 24, NULL, 1, NULL),
(24, NULL, 72, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 26, NULL, 3, NULL),
(25, NULL, 24, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 29, NULL, 1, NULL),
(26, NULL, 31, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 30, NULL, 1, NULL),
(27, NULL, 5, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 31, NULL, 1, NULL),
(28, NULL, 50, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 32, NULL, 1, NULL),
(29, NULL, 19, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 33, NULL, 1, NULL),
(30, NULL, 20, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 34, NULL, 3, NULL),
(31, NULL, 67, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 36, NULL, 1, NULL),
(32, NULL, 59, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 37, NULL, 1, NULL),
(33, NULL, 32, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 39, NULL, 1, NULL),
(34, NULL, 49, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 38, NULL, 1, NULL),
(35, NULL, 23, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 42, NULL, 1, NULL),
(36, NULL, 77, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 43, NULL, 1, NULL),
(37, NULL, 76, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 45, NULL, 3, NULL),
(38, NULL, 1, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 44, NULL, 3, NULL),
(39, NULL, 11, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 47, NULL, 3, NULL),
(40, NULL, 69, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 48, NULL, 1, NULL),
(41, NULL, 12, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 49, NULL, 1, NULL),
(42, NULL, 53, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 50, NULL, 3, NULL),
(43, NULL, 8, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 51, NULL, 1, NULL),
(44, NULL, 43, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 3, 52, NULL, 3, NULL),
(45, NULL, 16, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 54, NULL, 1, NULL),
(46, NULL, 38, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 3, 55, NULL, 1, NULL),
(47, NULL, 3, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 3, 56, NULL, 1, NULL),
(48, NULL, 64, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 3, 57, NULL, 1, NULL),
(49, NULL, 41, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 3, 58, NULL, 1, NULL),
(50, NULL, 60, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 3, 75, NULL, 1, NULL),
(51, NULL, 10, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 3, 78, NULL, 3, NULL),
(52, NULL, 15, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 3, 79, NULL, 1, NULL),
(53, NULL, 79, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, 'EN remplacement de son ordi Asus...l\'utilisateur precedant est Fetegué OUATTARA', 1, 12, NULL, 1, NULL),
(54, NULL, 65, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, 'Ordi precedemment utilisé par SAKA', 1, 3, NULL, 1, NULL),
(55, NULL, 72, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 22, NULL, 3, NULL),
(56, NULL, 80, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 1, 10, NULL, 1, NULL),
(57, NULL, 74, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 17, NULL, 1, NULL),
(58, NULL, 86, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 40, NULL, 1, NULL),
(59, NULL, 87, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 3, 52, NULL, 1, NULL),
(60, NULL, 88, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 3, 59, NULL, 1, NULL),
(61, NULL, 72, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 104, NULL, 1, NULL),
(62, NULL, 10, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 26, NULL, 1, NULL),
(63, NULL, 91, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 3, 105, NULL, 1, NULL),
(64, NULL, 92, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 106, NULL, 1, NULL),
(65, NULL, 93, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 3, 98, NULL, 1, NULL),
(66, NULL, 18, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, 'ordi utilisé auparavant par F NDEPO', 2, 109, NULL, 1, NULL),
(67, NULL, 68, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 1, 15, NULL, 1, NULL),
(68, NULL, 29, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 47, NULL, 1, NULL),
(69, NULL, 11, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 46, NULL, 1, NULL),
(70, NULL, 17, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, 'ancien user  Carine Gonto', 2, 41, NULL, 1, NULL),
(71, NULL, 17, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, 'ancien user  Carine Gonto', 2, 41, NULL, 1, NULL),
(72, NULL, 37, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, 'ancien utilisateur JAURES ', 1, 110, NULL, 1, NULL),
(73, NULL, 94, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, 'machine de Wiliams utilisé provisoirement  par DOBRE', 2, 111, NULL, 1, NULL),
(74, NULL, 95, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 4, 93, NULL, 1, NULL),
(75, NULL, 96, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 4, 94, NULL, 1, NULL),
(76, NULL, 96, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 4, 94, NULL, 1, NULL),
(77, NULL, 39, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 5, 88, NULL, 1, NULL),
(78, NULL, 36, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 5, 89, NULL, 1, NULL),
(79, NULL, 36, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 5, 89, NULL, 1, NULL),
(80, NULL, 29, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, '', 2, 25, NULL, 3, NULL),
(81, NULL, 5, NULL, 'ORDI', NULL, NULL, NULL, NULL, 'oui', NULL, NULL, 'gestion des affaires', 4, 5, NULL, 1, NULL),
(82, NULL, 4, '1', 'immobilier', 'Bureau', '2022-01-01', '2023-01-01', '2021-09-25 06:50:10', 'oui', NULL, 'Changement de lieu de travail', NULL, NULL, NULL, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `idcategorie` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(45) DEFAULT NULL,
  `dateEn` datetime DEFAULT NULL,
  PRIMARY KEY (`idcategorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idcategorie`, `libelle`, `dateEn`) VALUES
(1, 'Matériel informatique', '2021-02-05 10:47:34'),
(2, 'Matériel de bureau', '2021-02-05 11:02:21'),
(3, 'Matériel immobilier', '2021-02-05 11:02:39'),
(4, 'Matériel électromenager', '2021-02-05 11:02:59');

-- --------------------------------------------------------

--
-- Structure de la table `demande`
--

DROP TABLE IF EXISTS `demande`;
CREATE TABLE IF NOT EXISTS `demande` (
  `idDemande` int(5) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenoms` varchar(80) NOT NULL,
  `projetAT` varchar(80) NOT NULL,
  `dateD` date NOT NULL,
  `dateF` date NOT NULL,
  `commentaire` text NOT NULL,
  `idRespo` int(5) NOT NULL,
  PRIMARY KEY (`idDemande`),
  KEY `idRespo` (`idRespo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `direction`
--

DROP TABLE IF EXISTS `direction`;
CREATE TABLE IF NOT EXISTS `direction` (
  `id_direction` int(5) NOT NULL AUTO_INCREMENT,
  `nom_direction` varchar(20) DEFAULT NULL,
  `dateEn` datetime DEFAULT NULL,
  PRIMARY KEY (`id_direction`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `direction`
--

INSERT INTO `direction` (`id_direction`, `nom_direction`, `dateEn`) VALUES
(1, 'DIRECTION GENERALE', '2021-02-04 03:55:15'),
(2, 'DACH', '2021-02-04 03:56:31'),
(3, 'DIVISION MARKETING', '2021-02-04 03:56:47'),
(4, 'DSMR', '2021-02-04 03:57:19'),
(5, 'DAH', '2021-02-04 03:57:42'),
(6, 'DFSI', '2021-02-04 03:57:59'),
(7, 'DSIN', '2021-02-04 03:58:16');

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `idEmploye` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenoms` varchar(50) NOT NULL,
  `fonction` varchar(45) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `sexe` varchar(20) NOT NULL,
  `commentaire` text DEFAULT NULL,
  `roles` varchar(20) NOT NULL,
  `date_ajout` date NOT NULL,
  `mot_passe` varchar(9) DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `id_direction` int(5) DEFAULT NULL,
  `idService` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT 1,
  `id_site` int(11) DEFAULT NULL,
  `photo` varchar(30) NOT NULL DEFAULT 'avatar.PNG',
  PRIMARY KEY (`idEmploye`),
  KEY `fk_Employe_service_idx` (`idService`),
  KEY `id_site` (`id_site`),
  KEY `id_direction` (`id_direction`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`idEmploye`, `nom`, `prenoms`, `fonction`, `email`, `contact`, `sexe`, `commentaire`, `roles`, `date_ajout`, `mot_passe`, `status`, `id_direction`, `idService`, `active`, `id_site`, `photo`) VALUES
(1, 'Mangoua', 'Yves-Marcel', 'Developpeur', 'mangahua@gmail.com', '0759191107', 'HOMME', NULL, 'Administrateur', '2021-02-03', '1234', 0, NULL, NULL, 1, NULL, 'avatar.PNG'),
(3, 'BAMBA', 'Abou', 'informatique', 'aboubamba@agencecipme.ci', '00000000', 'Homme', NULL, 'Manageur', '2121-02-04', 'admin123', 0, 7, 4, 1, 1, 'avatar.PNG'),
(4, 'N\'DA', 'ANDERSON', '', 'anda@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-04', 'I868XE6Z', 0, 5, 8, 1, 2, 'avatar.PNG'),
(5, 'YORO', 'ANGE', '', 'ayoro@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-04', 'I0KW9INB', 0, 4, 8, 1, 2, 'avatar.PNG'),
(6, 'GAUA', 'Anita', 'informatique', 'agaua@agencecipme.c', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-04', 'Z1DAIH5N', 0, 6, 4, 1, 1, 'avatar.PNG'),
(7, 'OUFFOUET', 'ANNE MERCY', 'Communication', 'aouffouet@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-04', 'EW0XUZJV', 1, 3, 9, 0, 2, 'avatar.PNG'),
(8, 'BLAH', 'Aristide', '', 'blah@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-04', '30OA5RA7', 0, 1, 8, 1, 2, 'avatar.PNG'),
(9, 'ADOPO', 'Arsene', '', 'adopo@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-04', 'EIG8TJYQ', 0, 4, 8, 1, 3, 'avatar.PNG'),
(10, 'ANIH', 'Arsene', '', 'aanih@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-04', 'BZUBF43U', 0, 1, 8, 1, 4, 'avatar.PNG'),
(11, 'CISSE', 'Djeneba', 'Developpeur', 'cdjeneba@agencecipme.ci', '08720431', 'Femme', NULL, 'Administrateur', '2121-02-04', '856LIB35', 0, 6, 4, 1, 3, 'avatar.PNG'),
(12, 'KOFFI', 'Aurelie', '', 'akoffi@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-04', 'C783C3QW', 0, 5, 8, 1, 2, 'avatar.PNG'),
(13, 'DOSSO', 'Awa', '', 'adosso@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-04', 'DLGLJ17C', 0, 1, 8, 1, 1, 'avatar.PNG'),
(14, 'BAMBA', 'Salimou', 'Directeur général', 'sbamba@agencecipme.ci', '00000000', 'Homme', NULL, 'Administrateur', '2121-02-04', '2PISJWCG', 0, 1, 8, 1, 1, 'avatar.PNG'),
(15, 'YOUGOUE BI', 'Bedel', '', 'byougoue@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-04', 'SBOJZY9P', 0, 1, 8, 1, 5, 'avatar.PNG'),
(16, 'YAO', 'Carine', '', 'cyao@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-04', 'JPAHW4E5', 0, 1, 8, 1, 2, 'avatar.PNG'),
(17, 'DJIWONOU', 'Constant', '', 'cdjiwonou@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-04', '4PQH94NR', 0, 2, 3, 1, 1, 'avatar.PNG'),
(18, 'MESSOU', 'DEVI', '', 'dmessou@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-04', 'HOUH1VZI', 0, 1, 8, 1, 2, 'avatar.PNG'),
(19, 'KONE', 'Daba', '', 'kdaba@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'OAPERSKQ', 0, 1, 8, 1, 1, 'avatar.PNG'),
(20, 'AGOUSSI', 'Desiré', '', 'dagoussi@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'K3O9XGK2', 0, 1, 8, 1, 1, 'avatar.PNG'),
(21, 'KONE', 'Djoussougo', '', 'dkone@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'PPUD50HY', 0, 6, 8, 1, 1, 'avatar.PNG'),
(22, 'BROU', 'Edoukou Fabrice', '', 'fbrou@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'P05YHYAQ', 0, 3, 9, 1, 2, 'avatar.PNG'),
(23, 'MEHI', 'Edwige', '', 'eboka@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-08', 'RBX4RPHY', 0, 2, 3, 1, 1, 'avatar.PNG'),
(24, 'ASSI', 'Elvis', '', 'eassi@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', '483O80DV', 0, 1, 8, 1, 1, 'avatar.PNG'),
(25, 'N\'GNAME', 'Emilienne', '', 'engname@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-08', 'NTLVRDII', 0, 1, 8, 1, 1, 'avatar.PNG'),
(26, 'POKOU', 'Eunice', '', 'epokou@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-08', '81UVPJX7', 0, 2, 3, 1, 1, 'avatar.PNG'),
(27, 'AKA', 'Fabrice M\'Vouti', '', 'fmvouti@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'DRC89R1G', 0, 1, 9, 1, 2, 'avatar.PNG'),
(28, 'NAHOUNOU', 'Fatou', '', 'fnahounou@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-08', 'CZW1GHQY', 0, 1, 8, 1, 3, 'avatar.PNG'),
(29, 'OUATTARA', 'Fétégué Boun-Imbass', '', 'fouattara@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'L5E81PN5', 0, 4, 8, 1, 3, 'avatar.PNG'),
(30, 'FATOUMATA', 'Fondio', '', 'ffondio@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-08', 'YZKGYIGJ', 0, 5, 8, 1, 2, 'avatar.PNG'),
(31, 'KOUADIO', 'Guillaume', '', 'gkouadio@agencecipme.ci', '00000000', 'Homme', NULL, 'Administrateur', '2121-02-08', 'SNSLKT3Y', 0, 6, 4, 1, 2, 'avatar.PNG'),
(32, 'OPY', 'Guy', '', 'gopy@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'OONG1N7L', 0, 6, 8, 1, 1, 'avatar.PNG'),
(33, 'TOURE', 'Hadja Rima', '', 'hrima@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-08', 'MTSSGYF8', 0, 1, 8, 1, 2, 'avatar.PNG'),
(34, 'DJAIT', 'Hyacinthe', '', 'hdjait@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'MC6EIT3N', 0, 1, 8, 1, 3, 'avatar.PNG'),
(35, 'CAMARA', 'Irene', '', 'iklindjo@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-08', 'V1I3CLG2', 0, 1, 8, 1, 3, 'avatar.PNG'),
(36, 'CISSE', 'Ismael', '', 'icisse@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'SK7YK06U', 0, 4, 8, 1, 3, 'avatar.PNG'),
(37, 'BROU', 'Jakkie Ange', '', 'jbrou@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', '7Q8CNQME', 0, 3, 8, 1, 2, 'avatar.PNG'),
(38, 'GONDO', 'Jaures', '', 'jgondo@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', '3P36RDND', 0, 4, 8, 1, 2, 'avatar.PNG'),
(39, 'AKAFFOU', 'Jean Claude', '', 'cakaffou@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'P0GKZXQ9', 0, 6, 8, 1, 1, 'avatar.PNG'),
(40, 'KOUAME', 'Jean Jaurès', '', 'jkouame@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'H89RSE1L', 0, 3, 8, 1, 2, 'avatar.PNG'),
(41, 'BEBEI', 'Jean Luc', '', 'jlbebei@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', '747ONQUH', 0, 1, 8, 1, 3, 'avatar.PNG'),
(42, 'KOUASSI', 'Jean Luc', '', 'lkouassi@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', '2PSYULGH', 0, 1, 8, 1, 2, 'avatar.PNG'),
(43, 'BEDJE', 'Jeremie', 'Directeur des Systèmes d\'Information', 'jbedje@agencecipme.ci', '0574059999', 'Homme', NULL, 'Administrateur', '2121-02-08', '1234', 0, 7, 4, 1, 1, 'avatar.PNG'),
(44, 'ESSOH', 'Jordan', '', 'jessoh@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', '45T0440L', 0, 3, 8, 1, 2, 'avatar.PNG'),
(45, 'ASSEMIAN', 'Kevin', '', 'kassemian@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'JXPER2PR', 0, 1, 8, 1, 2, 'avatar.PNG'),
(46, 'WEDEU', 'Kla', '', 'jkla@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'MSM699D8', 0, 2, 3, 1, 2, 'avatar.PNG'),
(47, 'SYLLA', 'Lacina', '', 'lsylla@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'ELWTMXP7', 0, 2, 2, 1, 1, 'avatar.PNG'),
(48, 'KOBO', 'Laeticia Aubierge', '', 'akobo@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-08', '0RXXSQM1', 0, 5, 8, 1, 2, 'avatar.PNG'),
(49, 'SORO', 'Laurent', '', 'lsoro@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'XHY2TUD8', 0, 6, 8, 1, 1, 'avatar.PNG'),
(50, 'DIBY', 'Lucien', '', 'ldiby@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', '8DPL91UM', 0, 1, 8, 1, 3, 'avatar.PNG'),
(51, 'YODA', 'Mamadou', '', 'myoda@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'JLQUIKON', 0, 5, 8, 1, 3, 'avatar.PNG'),
(52, 'KOUASSI', 'Melaine', '', 'mkouassi@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-08', 'N7WTPV1V', 0, 5, 8, 1, 2, 'avatar.PNG'),
(53, 'TOURE', 'Mory', '', 'motoure@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'ZS8HVGN4', 0, 2, 3, 1, 2, 'avatar.PNG'),
(54, 'CISSE', 'Moussa', '', 'cmoussa@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'W1INSC2P', 0, 1, 8, 1, 2, 'avatar.PNG'),
(55, 'LAKOU', 'Nancy', '', 'nlakou@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-08', '8YXVTEO0', 0, 1, 8, 1, 1, 'avatar.PNG'),
(56, 'NDEPO', 'François', '', 'ndepo@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'NI1GB9M8', 0, 1, 8, 1, 2, 'avatar.PNG'),
(57, 'SANOGO', 'Oumou', '', 'dsanogo@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-08', 'QWMO1PQ7', 0, 1, 8, 1, 2, 'avatar.PNG'),
(58, 'BADO', 'Pacome', '', 'pbado@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'ZPGVOPHP', 0, 6, 8, 1, 1, 'avatar.PNG'),
(59, 'NIANDO', 'Pascal', '', 'pniando@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'YI8YUNON', 0, 6, 8, 1, 1, 'avatar.PNG'),
(60, 'YOAN', 'Patrice', '', 'pyoan@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-08', 'NU19TN8R', 0, 1, 8, 1, 4, 'avatar.PNG'),
(61, 'KONIN', 'Patricia', '', 'pkonin@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-08', 'GHQTLIQC', 0, 1, 8, 1, 4, 'avatar.PNG'),
(62, 'BROU', 'Patrick Lamoa', '', 'lamoa@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-08', 'BBAF083O', 0, 2, 8, 1, 2, 'avatar.PNG'),
(63, 'ASSANDE', 'Paul', '', 'passande@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'AUP8FHP8', 0, 1, 8, 1, 2, 'avatar.PNG'),
(64, 'N\'GORAN', 'Paul', '', 'pngoran@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'FQN377QE', 0, 4, 8, 1, 3, 'avatar.PNG'),
(65, 'KOFFI', 'Pierre', '', 'pkoffi@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'NB4UPBQ6', 0, 4, 8, 1, 3, 'avatar.PNG'),
(66, 'KOUADIO', 'Prisca', '', 'pkouadio@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-08', 'D5EKSA6W', 0, 5, 8, 1, 2, 'avatar.PNG'),
(67, 'FOFANA', 'Siaka', '', 'sfofana@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'W3OUB4XN', 0, 4, 8, 1, 3, 'avatar.PNG'),
(68, 'SORO', 'Siaka', '', 'ssoro@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', '86NHA006', 0, 4, 8, 1, 3, 'avatar.PNG'),
(69, 'ISSOUF', 'Soumahoro', '', 'ysoumahoro@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'KWNN765B', 0, 1, 8, 1, 2, 'avatar.PNG'),
(70, 'BAMBA', 'Tiemoko', '', 'btiemoko@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', '450RDNB5', 0, 5, 8, 1, 2, 'avatar.PNG'),
(71, 'LAGO', 'Verkysse', '', 'vlago@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', '1SAVINNE', 0, 6, 4, 1, 3, 'avatar.PNG'),
(72, 'BROU', 'Vincent', '', 'vbrou@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'LNGQMQV2', 0, 4, 8, 1, 1, 'avatar.PNG'),
(73, 'NGUESSAN', 'William', '', 'wnguessan@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'MO4XQDDF', 0, 1, 8, 1, 3, 'avatar.PNG'),
(74, 'KONE', 'Yaya', '', 'ykone@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'LB6HS44V', 0, 2, 8, 1, 3, 'avatar.PNG'),
(75, 'Koffi', 'Elisabeth', '', 'ekoffi@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-08', 'NSA8JPXG', 0, 1, 8, 1, 3, 'avatar.PNG'),
(76, 'Karamoko', 'Ben-Moustapha', '', 'mkaramoko@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-08', 'GKSL2NXO', 0, 1, 8, 1, 2, 'avatar.PNG'),
(77, 'Koffi', 'Larissa Nadine', '', 'nadinek@gencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-08', '63NF34F3', 0, 3, 9, 1, 3, 'avatar.PNG'),
(78, 'Mangoua', 'racine', 'Developpeur', 'mangahua@gmail.com', '59191107', 'Homme', NULL, 'Manageur', '2121-02-12', 'Z7E3AJO6', 0, 6, 4, 1, 3, 'avatar.PNG'),
(79, 'OUFFOUE', 'Anne Mercy', 'Communication', 'aouffoue@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-16', 'WSAMILHJ', 0, 3, 9, 1, 2, 'avatar.PNG'),
(80, 'KAMATE', 'Namaza', 'Chargée de programme,communication ', 'nkamate@agencecipme.ci', '02008902', 'Femme', NULL, 'Utilisateur', '2121-02-19', '6RT0S1DE', 0, 7, 9, 1, 2, 'avatar.PNG'),
(81, 'Carine ', 'GONTO', 'ASSISTANTE PASSATION DE MARCHE ', 'cgonto@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-19', 'QTG5G1U2', 0, 1, 1, 1, 1, 'avatar.PNG'),
(82, 'KAMAGATE ', 'Mme', 'ASSISTANTE PCS', 'kamagate@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-19', '79FTWJTJ', 0, 1, 8, 1, 1, 'avatar.PNG'),
(83, 'TOURE', 'Kady', 'CT', 'ktoure@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-19', '8ZOCZUSJ', 0, 1, 8, 1, 1, 'avatar.PNG'),
(84, 'ATTOUNGBRE', 'CARMEL ', 'ANALYSTE SENIOR ', 'acarmel@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-19', '340ZMK9E', 0, 6, 6, 1, 3, 'avatar.PNG'),
(85, 'MOLO', 'Grace', 'experte Gestion de projets', 'gmolo@agencecipme.ci', '00000000', 'Femme', NULL, 'Utilisateur', '2121-02-19', '551S51PK', 0, 4, 10, 1, 3, 'avatar.PNG'),
(86, 'serveur', 'siege ', 'serveur ', 's@agencecipme.ci', '00000000', 'Homme', NULL, 'Administrateur', '2121-02-19', 'Y31KUVHH', 0, 1, 4, 1, 1, 'avatar.PNG'),
(87, 'NGORAN', 'Cedric', 'Expert Projets Business intelligence ', 'cngoran@agencecicpme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-26', '7988M4E7', 0, 1, 6, 1, 1, 'avatar.PNG'),
(88, 'COULIBALY', 'Inza', 'employé', 'icoulibaly@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-26', 'HKKYIFFC', 0, 1, 8, 1, 1, 'avatar.PNG'),
(89, 'YAO', 'ACKOPAIX', 'employé', 'ayao@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-26', '8J2C6JYQ', 0, 1, 8, 1, 5, 'avatar.PNG'),
(90, 'BANTY BI', 'Anicet', 'employé', 'a@aaaaa', '00000000', 'Homme', NULL, 'Utilisateur', '2121-02-26', 'ULDMFUTQ', 0, 1, 8, 1, 4, 'avatar.PNG'),
(91, 'KOUASSI', 'Fred', 'employé', 'aaaa@aaaa', '00000000', 'Homme', NULL, 'Utilisateur', '2121-03-02', 'ALMSDMZU', 0, 1, 8, 1, 5, 'avatar.PNG'),
(92, 'IRIE', 'Martin', 'employé', 'mirie@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-03-02', 'U3EJ1HSO', 0, 3, 9, 1, 2, 'avatar.PNG'),
(93, 'KLA', 'Sanga', 'employé', 'aaaaa@aaaaa', '00000000', 'Homme', NULL, 'Utilisateur', '2121-03-02', 'RNURU310', 0, 1, 8, 1, 5, 'avatar.PNG'),
(94, 'DOBRE', 'Christian ', 'employé', 'cdobre@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-03-29', 'ETQJO9LJ', 0, 4, 10, 1, 3, 'avatar.PNG'),
(95, 'SANOGO', 'Tenon ', 'employé', 'tsanogo@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-03-29', '82BFGKI3', 0, 4, 10, 1, 3, 'avatar.PNG'),
(96, 'SORO', 'Namongo', 'employé', 'nsoro@agencecipme.ci', '00000000', 'Homme', NULL, 'Utilisateur', '2121-03-29', '65VM727W', 0, 1, 1, 1, 3, 'avatar.PNG');

-- --------------------------------------------------------

--
-- Structure de la table `materiels`
--

DROP TABLE IF EXISTS `materiels`;
CREATE TABLE IF NOT EXISTS `materiels` (
  `idmateriel` int(2) NOT NULL AUTO_INCREMENT,
  `reference` varchar(15) DEFAULT NULL,
  `num_ordre_info` int(3) UNSIGNED ZEROFILL DEFAULT NULL,
  `id_direction` int(2) DEFAULT NULL,
  `date_achat` date DEFAULT NULL,
  `numserie` varchar(25) DEFAULT NULL,
  `descriptions` text DEFAULT NULL,
  `typemat` varchar(15) DEFAULT NULL,
  `marque` varchar(25) DEFAULT NULL,
  `model` varchar(20) DEFAULT NULL,
  `idcategorie` int(5) DEFAULT NULL,
  `idProjet` varchar(5) DEFAULT NULL,
  `dateEn` datetime DEFAULT NULL,
  `filtre_materiel` varchar(15) DEFAULT NULL,
  `processeur` varchar(10) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  PRIMARY KEY (`idmateriel`),
  KEY `id_direction` (`id_direction`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `materiels`
--

INSERT INTO `materiels` (`idmateriel`, `reference`, `num_ordre_info`, `id_direction`, `date_achat`, `numserie`, `descriptions`, `typemat`, `marque`, `model`, `idcategorie`, `idProjet`, `dateEn`, `filtre_materiel`, `processeur`, `status`) VALUES
(1, '03/03-001/2020', 001, 6, '2020-01-01', 'PF0S4K9C', NULL, 'Laptop', 'Lenovo', 'idepad 320', 1, '1', '2021-02-08 08:41:13', 'ORDI', 'I5', 1),
(2, '03/03-002/2020', 002, 6, '2020-01-01', 'PF0S4M4K', NULL, 'Laptop', 'Lenovo', 'Ideapas 320', 1, '1', '2021-02-08 08:58:45', 'ORDI', 'I5', 1),
(3, '01/03-003/2020', 003, 1, '2020-01-01', 'PF0S4K7T', NULL, 'Laptop', 'Lenovo', '', 1, '1', '2021-02-08 09:01:22', 'ORDI', 'I5', 1),
(4, '01/03-007/2020', 007, 1, '2020-01-01', 'PF0S4K9Q', NULL, 'Laptop', 'Lenovo', '', 1, '1', '2021-02-08 09:12:05', 'ORDI', 'I3', 1),
(5, '05/03-004/2020', 004, 1, '2020-01-01', 'PF0S4K81', NULL, 'Laptop', 'Lenovo', '', 1, '1', '2021-02-08 09:20:49', 'ORDI', 'I3', 1),
(6, '05/03-005/2020', 005, 4, '2020-01-01', 'PF1CHJWN', NULL, 'Laptop', 'Lenovo', 'ideapad 330', 1, '1', '2021-02-08 09:23:44', 'ORDI', 'I5', 1),
(7, '01/03-006/2020', 006, 1, '2020-01-01', 'PF1CG3S2', NULL, 'Laptop', 'Lenovo', 'Ideapad 330', 1, '1', '2021-02-08 09:28:00', 'ORDI', 'I5', 0),
(8, '05/03-009/2020', 009, 4, '2020-01-01', 'PF1CG3UF', NULL, 'Laptop', 'Lenovo', '', 1, '1', '2021-02-08 09:45:35', 'ORDI', 'DUAL CORE', 1),
(9, '04/03-008/2020', 008, 5, '2020-01-01', 'PF0S4M48', NULL, 'Laptop', 'Lenovo', '', 1, '1', '2021-02-08 09:47:18', 'ORDI', 'I3', 1),
(10, '01/03-010/2020', 010, 1, '2020-01-01', 'PF0S4K7L', NULL, 'Laptop', 'Lenovo', '', 1, '1', '2021-02-08 09:50:44', 'ORDI', 'DUAL CORE', 1),
(11, '03/03-011/2020', 011, 4, '2020-01-01', 'PF0S4S96', NULL, 'Laptop', 'Lenovo', 'Ideapad 330', 1, '1', '2021-02-08 09:58:24', 'ORDI', 'I5', 0),
(12, '05/03-012/2020', 012, 4, '2020-01-01', 'PF1CGMWG', NULL, 'Laptop', 'Lenovo', '', 1, '1', '2021-02-08 10:00:19', 'ORDI', 'I3', 1),
(13, '02/03-013/2020', 013, 2, '2020-01-01', 'PF0S4KA9', NULL, 'Laptop', 'Choisir la marque', 'Ideapad 330', 1, '1', '2021-02-08 10:02:58', 'ORDI', 'I5', 0),
(14, '01/03-014/2020', 014, 1, '2020-01-01', 'pf1cgkt7', NULL, 'Laptop', 'Lenovo', '', 1, '1', '2021-02-08 10:08:29', 'ORDI', 'I5', 1),
(15, '01/03-015/2020', 015, 1, '2020-01-01', 'PF0S4KAT', NULL, 'Laptop', 'Lenovo', 'ideapad 320', 1, '1', '2021-02-08 10:14:07', 'ORDI', 'I5', 1),
(16, '05/03-016/2020', 016, 1, '2020-01-01', 'PF1CGA97', NULL, 'Laptop', 'Lenovo', 'ideapad 330', 1, '1', '2021-02-08 10:21:21', 'ORDI', 'I5', 1),
(17, '02/03-017/2020', 017, 2, '2020-01-01', 'PF149R6Z', NULL, 'Laptop', 'Lenovo', '', 1, '2', '2021-02-08 10:23:12', 'ORDI', 'I5', 1),
(18, '01/03-019/2020', 019, 1, '2020-01-01', 'PF1CG105', NULL, 'Laptop', 'Lenovo', '', 1, '2', '2021-02-08 10:27:25', 'ORDI', 'I3', 0),
(19, '01/03-018/2020', 018, 2, '2020-10-01', 'pf14nsgh', NULL, 'Laptop', 'Lenovo', 'ideapad 330', 1, '2', '2021-02-08 10:29:37', 'ORDI', 'I5', 1),
(20, '01/03-020/2020', 020, 1, '2020-01-01', ' PF1CHGSS', NULL, 'Laptop', 'Lenovo', 'ideapad 330', 1, '2', '2021-02-08 10:33:27', 'ORDI', 'I5', 1),
(21, '01/03-021/2020', 021, 1, '2020-01-01', 'PF1CHLL7', NULL, 'Laptop', 'Lenovo', 'ideapad 330', 1, '2', '2021-02-08 10:36:55', 'ORDI', 'I5', 1),
(22, '01/03-022/2020', 022, 1, '2020-01-01', 'PF1H75B', NULL, 'Laptop', 'Lenovo', 'ideapad 330', 1, '2', '2021-02-08 10:41:23', 'ORDI', 'I5', 0),
(23, '04/03-023/2020', 023, 1, '2020-01-01', 'PF1CHGSZ', NULL, 'Laptop', 'Lenovo', 'ideapad 330', 1, '2', '2021-02-08 10:44:05', 'ORDI', 'I5', 1),
(24, '03/03-024/2020', 024, 5, '2020-01-01', 'SNPF14N9HX', NULL, 'Laptop', 'Lenovo', 'ideapad 330', 1, '2', '2021-02-08 10:48:54', 'ORDI', 'I5', 1),
(25, '01/03-025/2020', 025, 6, '2020-01-01', 'PF149BCX', NULL, 'Laptop', 'Lenovo', 'ideapad 330', 1, '2', '2021-02-08 10:51:24', 'ORDI', 'I5', 0),
(26, '05/03-026/2020', 026, 1, '2020-01-01', 'PF0S4K81', NULL, 'Laptop', 'Lenovo', 'ideapad 330', 1, '2', '2021-02-08 10:54:37', 'ORDI', 'I5', 1),
(27, '01/03-027/2020', 027, 4, '2020-01-01', 'PF1CHGT4', NULL, 'Laptop', 'Lenovo', 'ideapad 330', 1, '2', '2021-02-08 10:58:01', 'ORDI', 'I5', 0),
(28, '01/03-028/2020', 028, 1, '2020-01-01', 'PF1CG3TL', NULL, 'Laptop', 'Lenovo', 'ideapad 330', 1, '2', '2021-02-08 11:01:47', 'ORDI', 'I5', 0),
(29, '01/03-029/2020', 029, 1, '2020-01-01', 'PF1CG0ZM', NULL, 'Laptop', 'Lenovo', 'ideapad 330', 1, '2', '2021-02-08 11:05:31', 'ORDI', 'I5', 1),
(30, '05/03-030/2020', 030, 6, '2020-01-01', 'PF1CG718', NULL, 'Laptop', 'Lenovo', '', 1, '2', '2021-02-08 11:07:01', 'ORDI', 'I5', 1),
(31, '05/03-031/2020', 031, 6, '2020-01-01', 'PF1CGRGS', NULL, 'Laptop', 'Lenovo', 'ideapad 330', 1, '2', '2021-02-08 11:11:22', 'ORDI', 'I5', 1),
(32, '05/03-032/2020', 032, 4, '2020-01-01', 'PF14N9PA', NULL, 'Laptop', 'Lenovo', 'ideapad 330', 1, '2', '2021-02-08 11:13:13', 'ORDI', 'I5', 1),
(33, '01/03-033/2020', 033, 1, '2020-01-01', 'PF1CGMXD', NULL, 'Laptop', 'Lenovo', 'ideapad 330', 1, '2', '2021-02-08 11:21:20', 'ORDI', 'I5', 1),
(34, '01/03-034/2020', 034, 1, '2020-01-01', 'PF1CG8W9', NULL, 'Laptop', 'Lenovo', 'ideapad 330', 1, '2', '2021-02-08 11:26:55', 'ORDI', 'I5', 0),
(35, '01/03-035/2020', 035, 1, '2020-01-01', 'Non défini', NULL, 'Laptop', 'Lenovo', 'ideapad 330', 1, '2', '2021-02-08 11:31:31', 'ORDI', 'I5', 0),
(36, '03/03-036/2020', 036, 6, '2020-01-01', 'BJFDP42', NULL, 'Laptop', 'Dell', 'Inspiron 22-3277 AIO', 1, '2', '2021-02-08 11:40:13', 'ORDI', 'I5', 1),
(37, '03/03-037/2020', 037, 6, '2020-01-01', 'D9FDP42', NULL, 'Laptop', 'Dell', 'Inspiron 22-3277 AIO', 1, '2', '2021-02-08 11:51:52', 'ORDI', 'I5', 1),
(38, '03/03-039/2020', 039, 6, '2020-01-01', '9AS0042ACO', NULL, 'Laptop', 'Dell', '22-3277 AIO', 1, '2', '2021-02-08 12:05:22', 'ORDI', 'I5', 1),
(39, '03/03-037/2020', 037, 6, '2020-01-01', '09FDP42', NULL, 'Desktop', 'Dell', 'Inspiron 22-3277 AIO', 1, '2', '2021-02-08 12:08:37', 'ORDI', 'I5', 1),
(40, '03/03-040/2020', 040, 6, '2020-01-01', '9AS0041A00', NULL, 'Laptop', 'Dell', '22-3277 AIO', 1, '2', '2021-02-08 12:13:09', 'ORDI', 'I5', 1),
(41, '02/03-041/2020', 041, 2, '2020-01-01', '9A5007', NULL, 'Desktop', 'Dell', '22-3277 AIO', 1, '2', '2021-02-08 02:19:23', 'ORDI', 'I5', 1),
(42, '02/03-042/2020', 042, 2, '2020-01-01', '9A3006', NULL, 'Laptop', 'Dell', '22-3277 AIO', 1, '2', '2021-02-08 02:21:36', 'ORDI', 'I5', 1),
(43, '01/03-043/2020', 043, 1, '2020-01-01', 'F9FDP42', NULL, 'Laptop', 'Dell', 'Inspiron 22-3277 AIO', 1, '2', '2021-02-08 02:23:53', 'ORDI', 'I5', 1),
(44, '03/03-045/2020', 045, 6, '2020-01-01', '9DFDP42', NULL, 'Laptop', 'Lenovo', 'Inspiron 22-3277 AIO', 1, '2', '2021-02-08 02:27:53', 'ORDI', 'I5', 0),
(45, '01/03-044/2020', 044, 1, '2020-01-01', '99FDP42', NULL, 'Laptop', 'Dell', 'Inspiron 22-3277 AIO', 1, '2', '2021-02-08 02:30:10', 'ORDI', 'I5', 0),
(46, '03/03-045/2020', 045, 6, '2020-01-01', '9DFDP42', NULL, 'Laptop', 'Dell', 'Inspiron 22-3277 AIO', 1, '2', '2021-02-08 02:37:25', 'ORDI', 'I5', 1),
(47, '03/03-046/2020', 046, 6, '2020-01-01', 'C9FDP42', NULL, 'Laptop', 'Dell', ' 22-3277 AIO', 1, '2', '2021-02-08 02:42:00', 'ORDI', 'I5', 1),
(48, '01/03-047/2020', 047, 1, '2020-10-01', '44RG902', NULL, 'Laptop', 'Dell', 'Inspiron 22-3277 AIO', 1, '2', '2021-02-08 02:46:45', 'ORDI', 'I3', 1),
(49, '04/03-048/2020', 048, 5, '2020-01-01', 'GDFDP42', NULL, 'Laptop', 'Dell', 'Inspiron 22-3277 AIO', 1, '2', '2021-02-08 02:48:44', 'ORDI', 'I5', 1),
(50, '02/03-049/2020', 049, 2, '2020-01-01', 'DLFDP42', NULL, 'Laptop', 'Dell', 'Inspiron 22-3277 AIO', 1, '2', '2021-02-08 02:51:54', 'ORDI', 'I5', 0),
(51, '05/03-050/2020', 050, 4, '2020-01-01', 'HCFDP42', NULL, 'Laptop', 'Dell', 'Inspiron 22-3277 AIO', 1, '2', '2021-02-08 02:53:29', 'ORDI', 'I5', 1),
(52, '01/03-051/2020', 051, 1, '2020-01-01', 'J3N0CX04U400108', NULL, 'Laptop', 'Asus', ' X541U', 1, '3', '2021-02-08 02:55:03', 'ORDI', 'I5', 1),
(53, '01/03-051/2020', 051, 1, '2020-01-01', 'J3N0CX04U400108', NULL, 'Laptop', 'Asus', 'X541U', 1, '3', '2021-02-08 03:56:40', 'ORDI', 'I5', 0),
(54, '01/03-053/2020', 053, 1, '2020-01-01', 'J3N0CX04U394105', NULL, 'Laptop', 'Asus', ' X541U', 1, '3', '2021-02-08 04:00:01', 'ORDI', 'I5', 1),
(55, '05/03-054/2020', 054, 4, '2020-01-01', 'J3N0CX04U36010D', NULL, 'Laptop', 'Asus', 'X541U', 1, '3', '2021-02-08 04:02:56', 'ORDI', 'I5', 1),
(56, '04/03-055/2020', 055, 6, '2020-01-01', 'J3N0CX04U407108', NULL, 'Laptop', 'Asus', 'X541U', 1, '3', '2021-02-08 04:06:11', 'ORDI', 'I5', 1),
(57, '05/03-056/2020', 056, 4, '2020-01-01', 'J3N0CX04U35110A', NULL, 'Laptop', 'Asus', 'X541U', 1, '3', '2021-02-08 04:15:24', 'ORDI', 'I5', 1),
(58, '01/03-057/2020', 057, 1, '2020-01-01', 'J3N0CX04U41410A', NULL, 'Laptop', 'Asus', 'X541U', 1, '3', '2021-02-08 04:20:58', 'ORDI', 'I5', 1),
(59, '01/03-058/2020', 058, 1, '2020-01-01', 'J3N0CX04U41110G', NULL, 'Laptop', 'Asus', 'X541U', 1, '3', '2021-02-08 04:23:42', 'ORDI', 'I5', 1),
(60, '01/03-059/2020', 059, 1, '2020-01-01', 'J3N0CX04U37710E', NULL, 'Laptop', 'Asus', 'X541U', 1, '3', '2021-02-08 04:29:39', 'ORDI', 'I5', 0),
(61, '01/03-060/2020', 060, 1, '2020-01-01', 'J3N0CX04U40310F', NULL, 'Laptop', 'Asus', 'X541U', 1, '3', '2021-02-08 04:32:25', 'ORDI', 'I5', 0),
(62, '01/06-001/2020', 001, 1, '2020-01-01', 'NA', 'LG TV 49 pouces', NULL, NULL, NULL, 3, '3', '2021-02-08 04:35:06', 'IMMOBILIER', NULL, 0),
(66, '01/06-002/2020', 002, 1, '2020-01-01', 'SN 3407820130394220170141', 'Split-salle d\'accueil/ NASCO-1,5 CV', NULL, NULL, NULL, 3, '3', '2021-02-09 08:27:04', 'IMMOBILIER', NULL, 0),
(64, '01/06-003/2020', 003, 1, '2020-01-01', 'NA', 'meuble marron-blanc', NULL, NULL, NULL, 3, '3', '2021-02-09 08:22:07', 'IMMOBILIER', NULL, 0),
(65, '01/06-004/2020', 004, 1, '2020-01-01', 'NA', 'Meuble de rangement/marron', NULL, NULL, NULL, 3, '3', '2021-02-09 08:24:02', 'IMMOBILIER', NULL, 0),
(67, '01/06-005/2020', 005, 1, '2020-01-01', 'SN 3407820130394220170175', 'Split/ NASCO-1,5 CV', NULL, NULL, NULL, 3, '3', '2021-02-09 08:28:38', 'IMMOBILIER', NULL, 0),
(68, '01/06-006/2020', 006, 1, '2020-01-01', '07N01810025300019CK0850', 'NASCO-2 CV', NULL, NULL, NULL, 3, '3', '2021-02-09 08:43:10', 'IMMOBILIER', NULL, 0),
(69, '01/06-007/2020', 007, 1, '2020-01-01', 'NA', 'Meuble en métal-beige', NULL, NULL, NULL, 3, '3', '2021-02-09 08:45:21', 'IMMOBILIER', NULL, 0),
(70, '01/03-061/2020', 061, 1, '2020-01-01', 'J3N0CX04U366109', NULL, 'Laptop', 'Asus', 'X541U', 1, '3', '2021-02-09 08:45:27', 'ORDI', 'I5', 0),
(71, '01/06-008/2020', 008, 1, '2020-01-01', 'NA', 'Meuble en métal-beige', NULL, NULL, NULL, 3, '3', '2021-02-09 08:47:55', 'IMMOBILIER', NULL, 0),
(72, '01/03-062/2020', 062, 1, '2020-01-01', 'J3N0CX04U34310B', NULL, 'Laptop', 'Asus', ' X541U', 1, '3', '2021-02-09 08:50:11', 'ORDI', 'I5', 0),
(73, '01/03-064/2020', 064, 1, '2020-01-01', 'J3N0CX04U342109', NULL, 'Laptop', 'Asus', 'X541U', 1, '3', '2021-02-09 08:53:26', 'ORDI', 'I5', 0),
(74, '01/06-009/2020', 009, 1, '2020-01-01', 'NA', 'Meuble en métal-beige-conseiller-3', NULL, NULL, NULL, 3, '3', '2021-02-09 08:51:59', 'IMMOBILIER', NULL, 0),
(75, '01/03-065/2020', 065, 1, '2020-01-01', 'j3n0cx04U375109', NULL, 'Laptop', 'Asus', 'X541U', 1, '3', '2021-02-09 08:55:25', 'ORDI', 'I5', 1),
(76, '01/03-066/2020', 066, 1, '2020-01-01', 'j3n0cx04U374106', NULL, 'Laptop', 'Asus', 'X541U', 1, '3', '2021-02-09 08:57:05', 'ORDI', 'I5', 0),
(77, '01/06-010/2020', 010, 1, '2020-01-01', 'SN 3406406070388240150142', 'Split/NASCO-3CV', NULL, NULL, NULL, 3, '3', '2021-02-09 08:56:38', 'IMMOBILIER', NULL, 0),
(78, '01/03-067/2020', 067, 1, '2020-01-01', 'j3n0cx04U391108', NULL, 'Laptop', 'Asus', 'X541U', 1, '3', '2021-02-09 08:58:18', 'ORDI', 'I5', 0),
(79, '01/03-068/2020', 068, 1, '2020-01-01', 'j3n0cx04U36210D', NULL, 'Laptop', 'Asus', 'X541U', 1, '3', '2021-02-09 09:00:17', 'ORDI', 'I5', 1),
(80, '01/06-011/2020', 011, 1, '2020-01-01', 'NA', 'Meuble-marron-blanc', NULL, NULL, NULL, 3, '3', '2021-02-09 09:00:49', 'IMMOBILIER', NULL, 0),
(81, '01/06-012/2020', 012, 1, '2020-01-01', 'SN 3407820130394220170142', 'Split/NASCO-1,5CV', NULL, NULL, NULL, 3, '3', '2021-02-09 09:02:55', 'IMMOBILIER', NULL, 0),
(82, '01/03-070/2020', 070, 1, '2020-01-01', 'C02ZVFX5MD6M', NULL, 'Desktop', 'Apple', 'Mac book pro', 1, '2', '2021-02-09 09:03:36', 'ORDI', 'I5', 0),
(83, '01/06-013/2020', 013, 1, '2020-01-01', 'NA', 'meuble marron-foncé', NULL, NULL, NULL, 3, '3', '2021-02-09 09:06:50', 'IMMOBILIER', NULL, 0),
(84, '01/06-014/2020', 014, 1, '2020-01-01', 'NA', 'Meuble de rangement-marron-vitré', NULL, NULL, NULL, 3, '3', '2021-02-09 09:08:18', 'IMMOBILIER', NULL, 0),
(86, '01/06-015/2020', 015, 1, '2020-01-01', 'SN 3407820130394220170343', 'Split-NASCO-2 CV', NULL, NULL, NULL, 3, '3', '2021-02-09 09:20:20', 'IMMOBILIER', NULL, 0),
(87, '01/06-016/2020', 016, 1, '2020-01-01', 'A0000447', 'Mini réfrigérateur-ILUX- 47 litres', NULL, NULL, NULL, 4, '3', '2021-02-09 09:22:00', 'IMMOBILIER', NULL, 0),
(88, '01/03-071/2020', 071, 1, '2020-01-01', 'CND010551K', NULL, 'Laptop', 'HP', ' 250 G7', 1, '5', '2021-02-09 09:15:05', 'ORDI', 'I5', 1),
(89, '01/03-072/2020', 072, 1, '2020-01-01', 'CND0105500', NULL, 'Laptop', 'Choisir la marque', '250 G7', 1, '5', '2021-02-09 09:33:10', 'ORDI', 'I5', 1),
(90, '01/03-073/2020', 073, 1, '2020-01-01', 'CND010547L', NULL, 'Laptop', 'HP', '250 G7', 1, '5', '2021-02-09 09:34:37', 'ORDI', 'I5', 0),
(91, '01/03-074/2020', 074, 1, '2020-01-01', 'CND010558W', NULL, 'Laptop', 'Choisir la marque', '250 G7', 1, '5', '2021-02-09 09:36:10', 'ORDI', 'I5', 0),
(92, '01/03-075/2020', 075, 1, '2020-01-01', 'CND01055ZZ', NULL, 'Laptop', 'HP', '250 G7', 1, '5', '2021-02-09 09:37:40', 'ORDI', 'I5', 0),
(93, '01/03-076/2020', 076, 1, '2020-01-01', 'PF1CG72M', NULL, 'Laptop', 'Lenovo', ' Ideapad ', 1, '4', '2021-02-09 09:38:52', 'ORDI', 'I5', 1),
(94, '01/03-077/2020', 077, 1, '2020-01-01', 'PF1CG3TG', NULL, 'Laptop', 'Lenovo', 'Ideapad', 1, '5', '2021-02-09 09:40:46', 'ORDI', 'I5', 1),
(95, '01/03-078/2020', 078, 1, '2020-01-01', 'PF1CGPYH', NULL, 'Laptop', 'Lenovo', 'Ideapad', 1, '5', '2021-02-09 09:41:59', 'ORDI', 'I5', 0),
(96, '01/03-079/2020', 079, 1, '2020-01-01', 'PF1CGABD', NULL, 'Laptop', 'Lenovo', 'Ideapad', 1, '5', '2021-02-09 09:43:14', 'ORDI', 'I5', 0),
(97, '01/06-017/2020', 017, 1, '2020-01-01', 'NA', 'vidéo projecteur-S41 3300 ML(lamp type: ELPLP 96)', NULL, NULL, NULL, 3, '3', '2021-02-09 09:39:01', 'IMMOBILIER', NULL, 0),
(98, '01/03-81/2020', 081, 1, '2020-01-01', 'J3N0CX04U385100', NULL, 'Laptop', 'Asus', ' X541U', 1, '5', '2021-02-09 09:46:45', 'ORDI', 'I5', 1),
(99, '01/06-346/2020', 346, 1, '2020-01-01', 'M477fdw', NULL, 'Laser', 'Canon', 'Jet Pro MFP ', 1, '3', '2021-02-11 10:55:15', 'IMPRIMANTE', NULL, 1),
(100, '01/02-387-2020', 387, 1, '2020-01-01', 'VNBKN2T75G', NULL, 'Multifonction', 'Canon', 'serjet pro MFP', 1, '4', '2021-02-11 11:01:28', 'IMPRIMANTE', NULL, 1),
(101, '02/04-388/2020', 388, 2, '2020-01-01', 'VNBKN2T6LT', NULL, 'Multifonction', 'Canon', 'serjet pro MFP', 1, '4', '2021-02-11 11:04:41', 'IMPRIMANTE', NULL, 1),
(102, '03/04-389/2020', 389, 6, '2020-01-01', 'F177500', NULL, 'Multifonction', 'Canon', 'IR-ADV DX C3730i', 1, '4', '2021-02-11 11:06:19', 'IMPRIMANTE', NULL, 1),
(103, '02/04-364/2020', 364, 2, '2020-01-01', '2KE23001', NULL, 'Multifonction', 'Canon', 'IR-ADV C5535i', 1, '5', '2021-02-11 11:52:51', 'IMPRIMANTE', NULL, 1),
(105, '01/03-069/2020', 082, 1, '2020-03-01', 'J3N0CX04U378107', NULL, 'Laptop', 'Asus', 'ASUS X541U', 1, '3', '2021-03-02 08:54:55', 'ORDI', 'I5', 1),
(109, '01/03-022/2020', 089, 3, '2020-03-01', 'PF1CH75B', NULL, 'Laptop', 'Lenovo', 'IDEAPAD 330', 1, '2', '2021-03-04 09:16:27', 'ORDI', 'I5', 1),
(104, '00/025/2020', 002, 1, '2021-03-10', 'PF1CG3UL', NULL, 'Laptop', 'Lenovo', 'corei', 1, '2', '2021-03-01 10:53:41', 'ORDI', 'I5', 1),
(106, '01/03-070/2020', 083, 1, '2020-03-01', 'C02ZVFX5MD6M', NULL, 'Laptop', 'Apple', 'MacBook PRO', 1, '2', '2021-03-02 09:00:16', 'ORDI', 'I5', 1),
(107, '01/03-80/2020', 085, 1, '2020-03-01', '5CD0146TNB', NULL, 'Laptop', 'HP', 'HP PROBOOK ', 1, '4', '2021-03-02 09:39:55', 'ORDI', 'I5', 0),
(108, '02/03-013/2020', 088, 1, '2020-03-02', 'PF0S4KA9', NULL, 'Laptop', 'Lenovo', 'lenovo 330', 1, '1', '2021-03-02 03:08:26', 'ORDI', 'I5', 0),
(110, '01/03-070/2020', 090, 4, '2020-03-01', 'CZC8248388', NULL, 'Desktop', 'HP', 'AIO', 1, '1', '2021-03-19 08:59:34', 'ORDI', 'I5', 1),
(111, '02/03-013/2020', 080, 3, '2021-03-01', '38RG902', NULL, 'Desktop', 'Dell', 'INSPIRON 22-3277 AIO', 1, '2', '2021-03-29 04:14:32', 'ORDI', 'I5', 1),
(112, '01/03-070/2020', 090, 1, '2021-02-28', 'PF1CG72M', NULL, 'Laptop', 'Lenovo', 'L330', 1, '4', '2021-03-29 04:37:32', 'ORDI', 'I5', 0),
(113, 'hj05', 002, 1, '2021-09-01', 'fg015', 'table en verre', NULL, NULL, NULL, 3, '4', '2021-09-18 08:42:35', 'IMMOBILIER', NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `idProjet` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `des_projet` text DEFAULT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `dateEnre` datetime DEFAULT NULL,
  PRIMARY KEY (`idProjet`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`idProjet`, `nom`, `des_projet`, `dateDebut`, `dateFin`, `dateEnre`) VALUES
(1, 'GIZ-CLUSTER TIC', '', '2021-02-05', '2021-02-17', '2021-02-04 04:40:07'),
(2, 'GIZ-PAP', 'Programme d\'Appui à la Productivité des TPE et PME', '2021-02-05', '2021-02-27', '2021-02-05 10:31:59'),
(3, 'BM-PIDUCAS', '', '2021-02-10', '2021-02-27', '2021-02-05 10:34:57'),
(4, 'FSPME', 'Fond de soutient aux entreprises', '2021-02-08', '2021-03-07', '2021-02-05 10:44:36'),
(5, 'PAMO FSPME', '', '2021-02-13', '2021-02-25', '2021-02-05 10:46:17');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `idService` int(4) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(30) DEFAULT NULL,
  `nomRes` varchar(40) DEFAULT NULL,
  `prenRes` varchar(50) DEFAULT NULL,
  `mailRes` varchar(80) DEFAULT NULL,
  `dateEn` datetime DEFAULT NULL,
  `id_direction` int(4) DEFAULT NULL,
  PRIMARY KEY (`idService`),
  KEY `id_direction` (`id_direction`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `services`
--

INSERT INTO `services` (`idService`, `intitule`, `nomRes`, `prenRes`, `mailRes`, `dateEn`, `id_direction`) VALUES
(1, 'PASSATION DE MARCHE', '', NULL, NULL, '2021-02-04 04:17:44', 2),
(2, 'LOGISTIQUE', '', NULL, NULL, '2021-02-04 04:18:17', 2),
(3, 'RESSOURCE HUMAINE', '', NULL, NULL, '2021-02-04 04:18:31', 2),
(4, 'INFORMATIQUE', '', NULL, NULL, '2021-02-04 04:19:10', 6),
(5, 'COMPTABILITE', '', NULL, NULL, '2021-02-04 04:19:44', 6),
(6, 'SUIVIE EVALUATION', '', NULL, NULL, '2021-02-04 04:20:03', 1),
(7, 'AUDIT', '', NULL, NULL, '2021-02-04 04:20:39', 1),
(8, 'DIRECTION GENERALE', '', NULL, NULL, '2021-02-04 04:20:48', 1),
(9, 'COMMUNICATION', '', NULL, NULL, '2021-02-04 04:21:07', 3),
(10, 'DSMR', '', NULL, NULL, '2021-02-04 04:22:44', 4);

-- --------------------------------------------------------

--
-- Structure de la table `site`
--

DROP TABLE IF EXISTS `site`;
CREATE TABLE IF NOT EXISTS `site` (
  `id_site` int(2) NOT NULL AUTO_INCREMENT,
  `ville` varchar(20) DEFAULT NULL,
  `dateEn` datetime DEFAULT NULL,
  PRIMARY KEY (`id_site`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `site`
--

INSERT INTO `site` (`id_site`, `ville`, `dateEn`) VALUES
(1, 'ABIDJAN-SIEGE', '2021-02-04 03:48:06'),
(2, 'ABIDJAN-FSPME', '2021-02-04 03:51:05'),
(3, 'DREAM-FACTORY', '2021-02-04 03:53:26'),
(4, 'BCO SAN-PEDRO', '2021-02-04 03:53:50'),
(5, 'BOUAKE', '2021-02-04 03:54:44');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
