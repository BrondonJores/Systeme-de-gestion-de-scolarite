-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 25 juil. 2024 à 09:27
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `apptest`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `accounts`
--

INSERT INTO `accounts` (`Id`, `username`, `password`, `email`, `role`) VALUES
(13, 'HOUAKEU', '$2y$10$cXEoKZBLtEm7tBetMXzsMO6.V0exC9d1g5XZ5XgdoXsVIKG1Ij.py', 'Houakeu@gmail.com', '23U2497'),
(14, 'AKOSSE', '$2y$10$aWtpBzGWWBP4OWKaScNf/.tzDhbpB5H6p.b.NO1T1LsEluvTlxUmG', 'AKOSSE@gmail.com', '23U2225'),
(15, 'MESSI', '$2y$10$9Ji/k4oLXCYWuFZhVnkFOuQKC0dUwvUhnqeaf7RUy6iTQw9DBhuae', 'MESSI@gmail.com', '1');

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `Id_classe` varchar(100) NOT NULL,
  `Id_fil` varchar(100) DEFAULT NULL,
  `Niveau` varchar(10) DEFAULT NULL,
  `Grade` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Id_classe`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`Id_classe`, `Id_fil`, `Niveau`, `Grade`) VALUES
('1', '1', '1', 'L'),
('2', '1', '2', 'L');

-- --------------------------------------------------------

--
-- Structure de la table `deposer`
--

DROP TABLE IF EXISTS `deposer`;
CREATE TABLE IF NOT EXISTS `deposer` (
  `Matricule` varchar(100) NOT NULL,
  `Id_reqetrep` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `devoir`
--

DROP TABLE IF EXISTS `devoir`;
CREATE TABLE IF NOT EXISTS `devoir` (
  `Id_devoir` int NOT NULL AUTO_INCREMENT,
  `Id_eval` int NOT NULL,
  `Matricule` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Nom_devoir` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `intitule` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_devoir`),
  KEY `devoir1` (`Matricule`),
  KEY `devoir2` (`Id_eval`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `devoir`
--

INSERT INTO `devoir` (`Id_devoir`, `Id_eval`, `Matricule`, `Nom_devoir`, `intitule`) VALUES
(1, 4, '23U2497', '23U24974TP6_HOUAKEU_KAMGUIA_BRONDON_JORES.zip', 'TD ANGLAIS HOUAKEU'),
(2, 2, '23U2497', '23U24972TP6_HOUAKEU_KAMGUIA_BRONDON_JORES.zip', 'TD ICT 103 HOUAKEU');

-- --------------------------------------------------------

--
-- Structure de la table `enseignant`
--

DROP TABLE IF EXISTS `enseignant`;
CREATE TABLE IF NOT EXISTS `enseignant` (
  `UI` int NOT NULL,
  `Nom_enseignant` varchar(100) NOT NULL,
  `Id_UE` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `Telephone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`UI`),
  KEY `UE_FK` (`Id_UE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `enseignant`
--

INSERT INTO `enseignant` (`UI`, `Nom_enseignant`, `Id_UE`, `adresse`, `Telephone`, `email`) VALUES
(1, 'MESSI', '1', 'SIMALEN', '690881232', 'MESSI@facscience.cm');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
CREATE TABLE IF NOT EXISTS `etudiant` (
  `Nom` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Matricule` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Date_naissance` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Sexe` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Telephone` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Region_ori` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Type_bacc` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`Matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`Nom`, `Matricule`, `Date_naissance`, `Sexe`, `Telephone`, `Region_ori`, `Type_bacc`) VALUES
('MICHIRENDI VERLAINE BOREL', '21Q2325', '2005-09-04', 'M', '690101340', 'Ouest', 'TI'),
('MIKAM MEDZA PEREZ MIBELLE', '21T2814', '2004-10-19', 'M', '690101341', 'Ouest', 'TI'),
('MIASSE MIMBANG', '22V2255', '1999-03-20', 'M', '656372735', 'Ouest', 'D'),
('TCHOUALA NAMBOU JUNIOR', '22V2274', '2002-08-27', 'M', '655403837', 'Littoral', 'D'),
('SHALANYUY TOUOFO', '22V2276', '2004-06-15', 'M', '697128395', 'Ouest', 'C'),
('KENGNE MONGOU SAGNOL GRACIA', '22V2298', '2000-09-16', 'F', '656950046', 'Ouest', 'GCE A/L'),
('WANDJI KAMDA DARYL VALIN', '22V2312', '2004-05-05', 'M', '656038123', 'Ouest', 'TI'),
('EFA YANN MAXANCE', '22V2337', '2002-03-30', 'M', '657786442', 'Ouest', 'D'),
('TEPIELE NANFA BADEL ARTHUR', '22V2350', '2005-04-16', 'M', '683066627', 'Ouest', 'C'),
('SALWE MARSALA', '22V2384', '1999-12-12', 'F', '620169201', 'Bafoussam', 'D'),
('ELA GOELDHRIE LAVERDIERE ERCANE', '22v2386', '1999-01-22', 'M', '693116385', 'Sud', 'C'),
('TOUKAM TEUMBO IDRISS', '23L2194', '2003-11-18', 'M', '683066629', 'Yaounde', 'D'),
('PEMI SALAOUDINE AYOUBI BEN ALI', '23O2587', '2000-03-25', 'M', '657588317', 'Ouest', 'C'),
('FOWOUE GUEKAM MALICK BRYAN', '23Q2330', '2002-01-29', 'M', '678321070', 'Ouest', 'C'),
('BECHIR NASSOUR DAOUD', '23U2217', '2000-01-08', 'M', '690217026', 'Centre', 'GCE A/L'),
('KITIO FEUDJIO RICHTELLE', '23U2222', '2001-05-18', 'F', '696138470', 'Ouest', 'GCE A/L'),
('DJENU KEMCHE EDOUARD JUNIOR', '23U2223', '2003-03-16', 'M', '657737525', 'Ouest', 'GCE AL'),
('AKOSSEBE KOLOMSO TAWA', '23U2225', '2002-06-12', 'M', '687531210', 'Tchad', 'D'),
('FANGAING ANIEL SUNN', '23U2228', '2000-02-03', 'F', '658083647', 'Centre', 'D'),
('FOUADJOU TANKEU JAURES', '23U2229', '2003-09-20', 'M', '696865879', 'Ouest', 'D'),
('ALI YOUSSOUF ALI', '23U2234', '2004-04-22', 'M', '692853774', 'Tchad', 'D'),
('ALLAMINE MAHAMAT HAFIZ', '23U2236', '1999-04-17', 'M', '620178694', 'Tchad', 'C'),
('NKONGMENOCK LOIC PARFAIT', '23U2241', '2004-10-22', 'M', '683639232', 'Mbaleng', 'C'),
('JIMOGNA MFOUAPON MOHAMAD', '23U2250', '2001-07-02', 'M', '656236211', 'Ouest', 'D'),
('BUYADA ZIZAMLE RUBEN', '23U2252', '2002-02-25', 'M', '697802327', 'Littoral', 'D'),
('NGA BANPFOUMA JORAM', '23U2258', '1999-04-12', 'M', '655441804', 'centre', 'D'),
('MAGAME NTEPDIE YVAN PHAREL', '23U2264', '2000-12-06', 'M', '674724016', 'Ouest', 'C'),
('NGUEBOU SANDRA HORNELLE', '23U2270', '2002-07-30', 'F', '650248401', 'Ouest', 'C'),
('MBOCK PHILIPPE JOY', '23U2271', '2002-07-12', 'M', '652814514', 'Littoral', 'C'),
('MBAINADJI NEHEMI', '23U2272', '2005-06-21', 'M', '694542485', 'Tchad', 'C'),
('NGWA KOTI ANJEH KHRYSTIAN BRAYAN', '23U2273', '2004-08-01', 'M', '654002853', 'Ouest', 'TI'),
('NJI JOB JOEL YVAN', '23U2275', '1999-06-19', 'M', '654002855', 'Ouest', 'TI'),
('NOUBANGUE NKITH RUBEN FRANK', '23U2276', '2006-01-30', 'M', '683639236', 'Mbaleng', 'C'),
('NGUEFACK NDOMO STEPHANE', '23U2279', '1999-04-12', 'M', '650248402', 'Ouest', 'C'),
('NGO KOUAGNA NDAMO ROSE', '23U2281', '2001-11-20', 'F', '693697340', 'Ouest', 'C'),
('CHARLES NJOMO', '23U2282', '2006-02-27', 'M', '677405872', 'Nord-ouest', 'C'),
('BAYI YOUMBI HENRI RYAN HERVAN', '23U2283', '2004-04-27', 'M', '690217025', 'Centre', 'GCE A/L'),
('BONBA BRIGITTE', '23U2284', '2000-01-29', 'F', '677405871', 'Nord-ouest', 'C'),
('APIEBENG KENYO ESTHER', '23U2288', '2004-08-28', 'F', '620178695', 'Tchad', 'C'),
('ABOUBAKAR ABBASS OUMAR', '23U2289', '2001-03-06', 'M', '672244220', 'Tchad', 'D'),
('AZEBAZE BAHEBEG AUREL BRYAN', '23U2290', '1999-04-17', 'M', '691446807', 'Ouest', 'C'),
('ATCHOHE NOAH MARC ARISTOPHANE', '23U2291', '2003-08-18', 'M', '697467783', 'Centre', 'GCE A/L'),
('DJINE SINTO PAFING', '23U2292', '2004-05-24', 'M', '695242663', 'Tchad', 'C'),
('DINA KAMENI JOYCE CARELLE', '23U2293', '2002-03-12', 'F', '659678556', 'Nord-ouest', 'C'),
('DJOMO TAMATIO BAUDOUIN', '23U2295', '2006-12-28', 'M', '695242664', 'Tchad', 'C'),
('DJOMO YONDJIO JAPHET', '23U2296', '2003-09-10', 'M', '657786440', 'Ouest', 'D'),
('DIABO CESAR BRAYAN', '23U2297', '2004-11-30', 'M', '659678555', 'Nord-ouest', 'C'),
('MESSI EDIMA LOIC', '23U2301', '2005-10-18', 'M', '658739530', 'Ouest', 'C'),
('ANABA NKOUMOU RAPHAELLA', '23u2303', '2002-10-18', 'F', '620178698', 'Tchad', 'C'),
('ABANDA ABANDA JULIEN JUDICAEL', '23U2305', '2002-01-31', 'M', '672244226', 'Tchad', 'D'),
('KELCY AZEFACK', '23U2306', '2006-03-15', 'M', '670525888', 'Ouest', 'GCE A/L'),
('ALI FADEL DJANGOURI', '23U2308', '1999-07-24', 'M', '658888004', 'Tchad', 'C'),
('AZANDJIO NANFACK PAUL STEPHANE', '23U2312', '2005-05-16', 'M', '691446806', 'Ouest', 'C'),
('TASSOLIMO TIWA ZITA FABIOLA', '23u2313', '2002-03-02', 'F', '697802329', 'Littoral', 'D'),
('MANGOUO JACKY VICTOIRE', '23U2317', '2002-06-26', 'F', '694813081', 'Ouest', 'D'),
('MASOKE WASNYO JULES SIMON', '23U2319', '1999-06-03', 'M', '691594084', 'Centre', 'D'),
('MOTO ARIEL', '23U2321', '1999-03-20', 'M', '690101342', 'Ouest', 'TI'),
('CHOUPO FOGAING RUDY AUBIN', '23U2322', '2006-10-14', 'M', '659678554', 'Nord-ouest', 'C'),
('CHINDA TADIDA IVAN DARYL', '23U2324', '1999-01-12', 'M', '677405873', 'Nord-ouest', 'C'),
('BIANDA TCHANA ODILON PARFAIT', '23U2327', '2001-10-03', 'M', '694097274', 'Ouest', 'D'),
('BANTA DIABO LEA ANGELE GRACE', '23U2328', '2004-01-24', 'F', '691446808', 'Ouest', 'C'),
('BISCIONGOL UDOKA CASSIDY', '23U2329', '2006-08-29', 'F', '671242642', 'Centre', 'GCE A/L'),
('BATIBONAK BISSEK BORIS', '23U2330', '2006-03-02', 'M', '690217024', 'Centre', 'GCE A/L'),
('BITJONG THEODORE WILFRIED', '23U2331', '2005-04-25', 'M', '651430838', 'Centre', 'C'),
('DZOGU SOKAMTE BRYAN IVAN', '23U2332', '2001-10-17', 'M', '657786441', 'Ouest', 'D'),
('DJAHO KEMAJOU THERESE LEANA', '23U2334', '2003-03-23', 'F', '659678557', 'Nord-ouest', 'C'),
('DJIEMO KEMBOU GRACE RIHANNA', '23U2335', '1999-08-12', 'F', '657737526', 'Ouest', 'GCE AL'),
('SELABI MOFFO LIONEL RYAN', '23U2336', '2003-08-16', 'M', '697128394', 'Ouest', 'C'),
('SANKWE FEUKENG STELLA ELSA', '23U2337', '2000-07-05', 'F', '697128393', 'Ouest', 'C'),
('SIMO FOLEFACK WILLY', '23U2338', '2006-09-15', 'M', '657218320', 'Ouest', 'C'),
('SINDZE WAFFO MARC DONALD', '23U2339', '2000-01-05', 'M', '657218322', 'Ouest', 'C'),
('TEDAH EMMANUEL', '23U2340', '2003-01-30', 'M', '681171702', 'Ouest', 'D'),
('LADJOU TCHINDA NGALUX', '23U2342', '2004-02-19', 'M', '680622172', 'Ouest', 'C'),
('JOUFOGANG KOUDAZEM OCEANNE MEGANE', '23U2343', '2000-08-04', 'F', '693203132', 'Ouest', 'D'),
('ZANGUE SANDJI ROGER PAOLO RAYAN', '23U2344', '2004-09-03', 'M', '693076652', 'Ouest', 'D'),
('NJIFON NJOYA AROUNA FADIL', '23U2348', '2000-05-08', 'M', '654002857', 'Ouest', 'TI'),
('NGNIHEU LANKEU ARIANE MURIELLE', '23U2349', '2001-04-17', 'F', '693697349', 'Ouest', 'C'),
('YOUSSOUF NJOYA', '23U2350', '2003-12-19', 'M', '656038126', 'Ouest', 'TI'),
('NANYOU GILLES RAYMOND', '23U2351', '2002-02-25', 'M', '650007639', 'Ouest', 'C'),
('MAFOCK NGUNTE BERTHE FIDELE', '23U2353', '2005-10-27', 'F', '674724015', 'Ouest', 'C'),
('MAMA MERIGA MARC NDIAYE', '23U2354', '2006-12-02', 'M', '687029092', 'Tchad', 'D'),
('MARTIAL JEANNOT MAA', '23U2355', '2006-03-06', 'M', '656084868', 'Centre', 'C'),
('MAMA NDASSI FRANC WILLIAM', '23U2356', '2004-12-26', 'M', '687029093', 'Tchad', 'D'),
('MAHAMAT BARKAO MAIDE', '23U2358', '2001-01-15', 'M', '687029091', 'Tchad', 'D'),
('MBADZO NGUIMATIO ROSTAND', '23U2359', '2003-08-05', 'M', '691594085', 'Centre', 'D'),
('MELI TSAKI SUSY DIANDRA', '23u2360', '2002-11-20', 'F', '658739539', 'Ouest', 'C'),
('METUNOU POKAM STYVE ROMEO', '23U2361', '1999-03-02', 'M', '656372734', 'Ouest', 'D'),
('METOUNA LUCRESSE FRANCE', '23U2362', '2004-12-26', 'F', '699212676', 'Centre', 'D'),
('MANFOUO TSAFACK MICHAEL', '23U2364', '2004-06-02', 'M', '673444013', 'Ouest', 'C'),
('FAWZI MAHAMAT HISSEIN', '23U2365', '1999-04-07', 'M', '691949892', 'Tchad', 'D'),
('FOTSO FONOU PATRICK', '23U2367', '2004-04-04', 'M', '696264961', 'Ouest', 'C'),
('FOKENG DONGMO ALVINO BRAYAN', '23U2369', '2004-07-17', 'M', '657400649', 'Ouest', 'C'),
('FEGUE MENGUE JEANNE PATRICIA', '23U2370', '2002-12-12', 'F', '691949893', 'Tchad', 'D'),
('ISMAIL ABAKAR HAMID', '23U2372', '2006-12-13', 'M', '621342039', 'Tchad', 'D'),
('RIANGAR ELIE NADJIAM GLOIRE', '23U2373', '2002-10-04', 'M', '696280172', 'Centre', 'D'),
('YOUDOM PUEUMEN AXEL YOANNEL', '23U2374', '2002-10-22', 'M', '656038125', 'Ouest', 'TI'),
('YEMENE LOMBOUE ORCHELLE', '23U2375', '2003-06-12', 'F', '656038124', 'Ouest', 'TI'),
('WABO TACHAGO DANIEL RIYON', '23U2376', '2004-07-31', 'M', '683911998', 'Ouest', 'D'),
('TCHEOTO BERENGER ROOSEVELT', '23U2380', '2001-11-14', 'M', '697802322', 'Littoral', 'D'),
('TOUKEA PESSONG NESTOR CORNEILLE', '23U2381', '2002-05-14', 'M', '683066620', 'Yaounde', 'D'),
('FEUZEU FANKAP DAVID NEILS', '23U2384', '1999-05-27', 'M', '657400648', 'Ouest', 'C'),
('FOSSO ULRICH VERKYS', '23U2386', '2002-08-30', 'M', '696264960', 'Ouest', 'C'),
('FETGO BATHEU DANIELA LAURENCE', '23U2387', '1999-04-03', 'F', '657400647', 'Ouest', 'C'),
('FEMBA TCHATCHOUA FRANC ROUSSEL', '23U2388', '2002-12-31', 'F', '657400646', 'Ouest', 'C'),
('TSOUATA NGOULA VICLANE', '23U2390', '2006-12-04', 'F', '683911997', 'Ouest', 'D'),
('TALLA FOSSI DONATIEN', '23U2392', '2005-10-01', 'M', '695538540', 'Littoral', 'TI'),
('TALLA DARRYL BRYAN', '23U2393', '2000-02-05', 'M', '657218324', 'Ouest', 'C'),
('TSAKEM TEMGOUA ROSLYNE CHELLA', '23U2395', '2005-12-07', 'F', '697301116', 'Ouest', 'TI'),
('MAMBOU KOGUEM WILLIAMS WALLACE', '23U2398', '2005-04-16', 'M', '673444011', 'Ouest', 'C'),
('MANDENG JUDITH OCEANNE', '23U2399', '2000-12-19', 'F', '673444012', 'Ouest', 'C'),
('NZAHA NEGHAM NAOMI SOLANGE', '23U2400', '2000-09-28', 'F', '681609716', 'Ouest', 'C'),
('NGONGANG NGOLAMZE YANN MARTIN', '23U2401', '2001-09-11', 'M', '693697342', 'Ouest', 'C'),
('NANA TCHOFFO STEVE JUNIOR', '23U2402', '2003-09-20', 'M', '691549865', 'Ouest', 'C'),
('NGOMSI PAGUIE YVAN', '23U2405', '1999-08-15', 'M', '693697341', 'Ouest', 'C'),
('NGA YENDE ALI JUNIOR', '23U2406', '2003-11-09', 'M', '694565160', 'Ouest', 'TI'),
('NONKI SAHA JACOB', '23U2407', '1999-04-04', 'M', '683639234', 'Mbaleng', 'C'),
('NANGMO ANDY NELSON', '23U2408', '2001-08-14', 'M', '650007638', 'Ouest', 'C'),
('NGUEGUIM DJIMELE LESLIE', '23U2409', '2002-06-13', 'F', '654002852', 'Ouest', 'TI'),
('FOKOU TEMFACK TEDY', '23U2410', '2003-04-23', 'M', '657400640', 'Ouest', 'C'),
('TSIMI DJEUKAM FRANCK EMMANUEL', '23U2411', '1999-08-14', 'M', '655550530', 'centre', 'D'),
('TOUKO TOMTA EDEN MAXIMIN', '23U2413', '2006-07-01', 'M', '687073264', 'Ouest', 'C'),
('TEMDJI YIMETIO BRENDA', '23U2416', '2003-05-22', 'F', '683066625', 'Ouest', 'C'),
('TONYE II FRANK JUNIOR', '23U2417', '2002-05-29', 'M', '683066628', 'Yaounde', 'D'),
('TAMANJI CHARLES FUH CHARLES', '23U2418', '2002-03-09', 'M', '697802328', 'Littoral', 'D'),
('TEGANG KAMBI CHRISTIAN VANNEL', '23U2419', '2000-11-07', 'M', '683066624', 'Ouest', 'C'),
('BEGUENEGUEGNE DIDIER ROSTAN', '23U2421', '2001-02-10', 'M', '690217027', 'Centre', 'GCE A/L'),
('TATCHUANG WONDJA JUDICAEL', '23U2424', '2003-10-11', 'M', '697802320', 'Littoral', 'D'),
('TSAFACK MIGUEL DEAHUINE', '23U2425', '2004-04-03', 'M', '692491259', 'Ouest', 'C'),
('ESSAMA ESSAMA DAVE CHRISTIAN', '23u2436', '2000-08-17', 'M', '657786445', 'Ouest', 'D'),
('EMADJEU EMADJEU CEDRIC MARTIAL', '23U2438', '2000-08-18', 'M', '657786444', 'Ouest', 'D'),
('EVOUNA BELOBO DIDIER BARTHELEMY', '23U2439', '2003-09-11', 'M', '691572414', 'Centre', 'D'),
('MAHAMAT ALI', '23U2448', '2004-01-01', 'M', '659574523', 'Tchad', 'D'),
('KAMDEM WOYIM FRANCK ROMAIN', '23U2485', '2000-12-02', 'M', '694817837', 'Ouest', 'D'),
('KOUAM TAMWOKAM YVES BORIS', '23U2487', '2001-03-31', 'M', '696294535', 'Ouest', 'D'),
('KEMGANG POULAH GABRIELLE AIMEE', '23U2488', '2001-01-31', 'F', '695663456', 'Ouest', 'D'),
('KENMOGNE ANGE', '23U2490', '1999-11-27', 'F', '656950047', 'Ouest', 'GCE A/L'),
('KENMOGNE TAKOU CYRILLE JORDAN', '23U2493', '2000-10-22', 'M', '656950048', 'Ouest', 'GCE A/L'),
('HOUAKEU KAMGUIA BRONDON JORES', '23U2497', '2000-07-17', 'M', '621200152', 'Ouest', 'TI'),
('GNAMSIE CHINMOUN FADIL', '23U2499', '2006-02-16', 'M', '678321072', 'Ouest', 'C'),
('GWOS CHRISTINE FELICITE', '23U2500', '2006-08-20', 'F', '678321074', 'Ouest', 'C'),
('GHADEUNE NZALLE GRACE', '23U2503', '1999-10-12', 'F', '678321071', 'Ouest', 'C'),
('GULENYONGA CHELSY LAPA', '23U2504', '2002-04-02', 'F', '678321073', 'Ouest', 'C'),
('PEUEMI KOUONANG ORLYNE', '23U2508', '2000-02-19', 'F', '657588318', 'Ouest', 'C'),
('WAFO WAFO CEDRIC', '23U2511', '2004-09-28', 'M', '683911999', 'Ouest', 'D'),
('WAFO WETHE VIANEY DARIUS', '23U2513', '2006-11-21', 'M', '683911990', 'Ouest', 'D'),
('TENE BANA MAXYM STEPHANE', '23U2514', '2002-08-25', 'M', '683066626', 'Ouest', 'C'),
('SADO KENGNE IVAN BRYAN', '23U2516', '1999-04-22', 'M', '620169200', 'Bafoussam', 'D'),
('SOCK SOCK EMMANUEL AMOUR', '23U2528', '2001-12-08', 'M', '657218323', 'Ouest', 'C'),
('KEUBENG TSASSE ESTEL GABREL', '23U2532', '2000-01-07', 'F', '656950040', 'Ouest', 'GCE A/L'),
('KEPMEFO KAMHOUA GEDEON', '23U2534', '2003-03-21', 'M', '656950049', 'Ouest', 'GCE A/L'),
('KAMGA JORDANE', '23U2536', '2003-10-20', 'M', '698886530', 'Ouest', 'C'),
('KAMGANG SUFFO VAIC HURIEL', '23U2537', '2004-08-10', 'M', '691705057', 'Ouest', 'D'),
('KENGNE MICHEL VANECK', '23U2543', '2004-10-13', 'M', '656950045', 'Ouest', 'GCE A/L'),
('NGASSIGA SIMB PRISCA', '23U2549', '2006-11-01', 'F', '694565161', 'Ouest', 'TI'),
('OUMBE JOSEPH JORKAELF BROWH', '23U2550', '2005-10-02', 'M', '681609718', 'Ouest', 'C'),
('NINTEDEM KENFACK LAURIANE', '23U2552', '2002-07-30', 'F', '654002854', 'Ouest', 'TI'),
('NJOPEKE FOUNSO ABDULAZIZ', '23U2554', '1999-04-09', 'M', '654002858', 'Ouest', 'TI'),
('KOUAWA BOUDA RYAN KEVIN', '23U2557', '2001-07-22', 'M', '680622171', 'Ouest', 'C'),
('KEUTIMBEU TCHANTCHO FRANCK MELVIN', '23U2559', '2005-03-21', 'M', '696138479', 'Ouest', 'GCE A/L'),
('KODOM PEFOUHO NELLY FOBASSO', '23U2560', '2000-10-04', 'M', '696138472', 'Ouest', 'GCE A/L'),
('EFFA EVOUNA EMMANUEL', '23U2564', '2002-04-17', 'M', '657786443', 'Ouest', 'D'),
('NOE FOGAING DARCHEVY', '23U2566', '2002-09-24', 'M', '683639233', 'Mbaleng', 'C'),
('NONO EMMANUEL STEVE', '23u2567', '2002-02-13', 'M', '683639235', 'Mbaleng', 'C'),
('NANA YIMGNIA GAITAN MOISE', '23U2576', '2006-04-17', 'M', '691549866', 'Ouest', 'C'),
('NDEM MICHEL PRIVAT', '23U2577', '2003-12-15', 'M', '655441802', 'centre', 'D'),
('NANFACK SOKENG ROVANOLD', '23U2581', '2000-04-25', 'M', '650007637', 'Ouest', 'C'),
('EYEBE EYEBE CHRISTIAN', '23u2630', '2001-01-08', 'M', '658083646', 'Centre', 'D'),
('ZIEM JANNY SOLEIL BOUQUET', '23U2655', '2004-10-31', 'F', '658873410', 'centre', 'GCE A/L'),
('NKADA MBATONGA RALPHON', '23U2675', '2006-06-08', 'M', '654002852', 'Ouest', 'TI'),
('NTSAMA ARMEL GHISLAIN', '23U2704', '2001-04-22', 'M', '683639237', 'Mbaleng', 'C'),
('SANDJO TCHOUA MAELISSE ANNIE', '23U2944', '2003-02-25', 'F', '620169202', 'Bafoussam', 'D'),
('NJIEMOUN MFONDOUM YASSINE ELBECHIR', '23U2968', '2005-09-18', 'M', '654002856', 'Ouest', 'TI'),
('NDEFFO OUMBE RAPHAIL NICHOLAS', '23V2033', '2006-12-03', 'M', '650007630', 'Ouest', 'C'),
('REINE ELISABETH OBANG MANGUELLE ||', '23V2067', '2001-09-23', 'F', '696280171', 'Centre', 'D'),
('BILLE THEOPHILE KEVIN', '23V2291', '2004-12-01', 'M', '681518489', 'Centre', 'D'),
('MANOH SONKOUE BRINDA', '23V2302', '2006-08-06', 'F', '678557966', 'Ouest', 'D'),
('ATIWA KUETE ELSA LAURAINE', '23V2352', '2004-12-06', 'F', '691446805', 'Ouest', 'C'),
('MADEGUI TEKEM GABRIELLE REBECCA', '23V2391', '2001-06-17', 'F', '677396176', 'Ouest', 'GCE A/L'),
('NDEMOU II NYATCHEBE DUTAU', '23V2392', '2001-07-11', 'M', '655441803', 'centre', 'D'),
('KOAGNE TENE SOP LILIAN MARTIN', '23V2419', '2006-06-08', 'M', '696138471', 'Ouest', 'GCE A/L'),
('ZIEM DAVID DE JESUIS', '23V2456', '2000-02-18', 'M', '691536319', 'Centre', 'GCE A/L'),
('SIMO MOGUE DANIELLE PATRICIA', '23V2547', '2003-01-19', 'F', '657218321', 'Ouest', 'C'),
('IBRAHIM ABAKAR KORI', '23V2783', '1999-02-07', 'M', '691503817', 'Tchad', 'D'),
('MEGNI DENGANG MADELEINE', '23V2851', '2005-08-22', 'F', '658739538', 'Ouest', 'C');

-- --------------------------------------------------------

--
-- Structure de la table `etudiantp`
--

DROP TABLE IF EXISTS `etudiantp`;
CREATE TABLE IF NOT EXISTS `etudiantp` (
  `Nom` varchar(40) DEFAULT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Matricule` varchar(100) NOT NULL,
  `Date_naissance` varchar(100) DEFAULT NULL,
  `Sexe` varchar(1) DEFAULT NULL,
  `Telephone` varchar(100) DEFAULT NULL,
  `Region_ori` varchar(100) DEFAULT NULL,
  `Type_bacc` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Matricule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `etudiantp`
--

INSERT INTO `etudiantp` (`Nom`, `Prenom`, `Matricule`, `Date_naissance`, `Sexe`, `Telephone`, `Region_ori`, `Type_bacc`) VALUES
('Houakeu ', 'Franck', '14U7616', '1998-08-07', 'M', '655452342', 'Ouest', 'TI'),
('Kemmogne', 'Armelle', '17L8427', '1999-08-17', 'F', '697275875', 'Ouest', 'TI'),
('Test', 'Test', '22U2983', '2024-07-12', 'F', '633225578', 'Centre', 'C'),
('Chella', 'Roslyne', '23V3816', '2024-07-12', 'F', '696121116', 'Ouest', 'TI'),
('Houakeu Kamguia', 'Brondon Jores', '24L4909', '2005-10-19', 'M', '633221145', 'Ouest', 'TI'),
('Reine', 'Elisabeth', '24U1750', '2024-07-12', 'F', '623257841', 'Centre', 'A');

-- --------------------------------------------------------

--
-- Structure de la table `evaluation`
--

DROP TABLE IF EXISTS `evaluation`;
CREATE TABLE IF NOT EXISTS `evaluation` (
  `Id_eval` int NOT NULL AUTO_INCREMENT,
  `Id_UE` int NOT NULL,
  `Id_type` int NOT NULL,
  PRIMARY KEY (`Id_eval`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `evaluation`
--

INSERT INTO `evaluation` (`Id_eval`, `Id_UE`, `Id_type`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(7, 2, 3),
(8, 2, 4),
(9, 3, 1),
(10, 3, 2),
(11, 3, 3),
(12, 3, 4),
(13, 4, 1),
(14, 4, 2),
(15, 4, 3),
(16, 4, 4),
(17, 5, 1),
(18, 5, 2),
(19, 5, 3),
(20, 5, 4),
(21, 6, 1),
(22, 6, 2),
(23, 6, 3),
(24, 6, 4),
(25, 7, 1),
(26, 7, 2),
(27, 7, 3),
(28, 7, 4),
(29, 8, 1),
(30, 8, 2),
(31, 8, 3),
(32, 8, 4),
(33, 9, 1),
(34, 9, 2),
(35, 9, 3),
(36, 9, 4),
(37, 10, 1),
(38, 10, 2),
(39, 10, 3),
(40, 10, 4),
(41, 11, 1),
(42, 11, 2),
(43, 11, 3),
(44, 11, 4),
(45, 12, 1),
(46, 12, 2),
(47, 12, 3),
(48, 12, 4);

-- --------------------------------------------------------

--
-- Structure de la table `faculte`
--

DROP TABLE IF EXISTS `faculte`;
CREATE TABLE IF NOT EXISTS `faculte` (
  `Id_fac` int NOT NULL,
  `Nom` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_fac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `faculte`
--

INSERT INTO `faculte` (`Id_fac`, `Nom`) VALUES
(1, 'SCIENCE');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

DROP TABLE IF EXISTS `filiere`;
CREATE TABLE IF NOT EXISTS `filiere` (
  `Id_fil` varchar(100) NOT NULL,
  `Nom` varchar(100) DEFAULT NULL,
  `Id_fac` int NOT NULL,
  PRIMARY KEY (`Id_fil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`Id_fil`, `Nom`, `Id_fac`) VALUES
('1', 'ICT', 1);

-- --------------------------------------------------------

--
-- Structure de la table `inquietude`
--

DROP TABLE IF EXISTS `inquietude`;
CREATE TABLE IF NOT EXISTS `inquietude` (
  `Matricule` varchar(30) NOT NULL,
  `Id_UE` varchar(30) NOT NULL,
  `Année` varchar(30) NOT NULL,
  `Obscution` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `inquietude`
--

INSERT INTO `inquietude` (`Matricule`, `Id_UE`, `Année`, `Obscution`) VALUES
('23U2305', '1', '2024', 'malade durant la composition'),
('23U2289', '2', '2023', 'absent durant année académique'),
('23U2225', '3', '2024', 'toujours présent mais problème de notes'),
('23U2308', '1', '2024', 'Pas de note'),
('23U2234', '1', '2023', 'Problème de matricule'),
('23U2236', '2', '2023', 'absence de paiement'),
('23u2303', '3', '2022', 'absence aux cours'),
('23U2288', '1', '2024', 'Nom mal écrit');

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

DROP TABLE IF EXISTS `inscrit`;
CREATE TABLE IF NOT EXISTS `inscrit` (
  `Matricule` varchar(100) DEFAULT NULL,
  `Id_classe` int DEFAULT NULL,
  `Année` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `inscrit`
--

INSERT INTO `inscrit` (`Matricule`, `Id_classe`, `Année`) VALUES
('24L4909', 1, '2024-07-12'),
('24U1750', 1, '2024-07-19'),
('23V3816', 1, '2023-06-12'),
('22U2983', 2, '2022-02-25'),
('14U7616', 2, '2014-06-13'),
('17L8427', 2, '2017-11-13');

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

DROP TABLE IF EXISTS `participer`;
CREATE TABLE IF NOT EXISTS `participer` (
  `Matricule` varchar(100) NOT NULL,
  `Id_eval` int NOT NULL,
  `note` float NOT NULL,
  PRIMARY KEY (`Matricule`,`Id_eval`),
  KEY `Id_eval` (`Id_eval`),
  KEY `Matricule` (`Matricule`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `participer`
--

INSERT INTO `participer` (`Matricule`, `Id_eval`, `note`) VALUES
('23U2225', 25, 15),
('23U2225', 26, 20),
('23U2225', 27, 15),
('23U2497', 1, 15),
('23U2497', 2, 17),
('23U2497', 3, 18),
('23U2497', 5, 15),
('23U2497', 6, 20),
('23U2497', 7, 10);

-- --------------------------------------------------------

--
-- Structure de la table `preinscription`
--

DROP TABLE IF EXISTS `preinscription`;
CREATE TABLE IF NOT EXISTS `preinscription` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Nom` varchar(100) NOT NULL,
  `Prenom` varchar(100) NOT NULL,
  `Inscrp` varchar(15) NOT NULL,
  `Id_classe` int NOT NULL,
  `Sexe` char(1) NOT NULL,
  `Date_naissance` date NOT NULL,
  `Id_fil` int NOT NULL,
  `Id_fac` int NOT NULL,
  `Type_Bacc` varchar(15) NOT NULL,
  `Reçu` varchar(150) NOT NULL,
  `Relevé_Bac` varchar(100) NOT NULL,
  `CNI` varchar(100) NOT NULL,
  `Region` varchar(100) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `Acte` varchar(100) NOT NULL,
  `Fiche` varchar(100) NOT NULL,
  `Année` varchar(15) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `preinscription`
--

INSERT INTO `preinscription` (`Id`, `Nom`, `Prenom`, `Inscrp`, `Id_classe`, `Sexe`, `Date_naissance`, `Id_fil`, `Id_fac`, `Type_Bacc`, `Reçu`, `Relevé_Bac`, `CNI`, `Region`, `telephone`, `Acte`, `Fiche`, `Année`) VALUES
(1, 'Reine', 'Elisabeth', '2024-07-12', 1, 'F', '2024-07-12', 1, 1, 'A', 'Reineseance de cours n6.pdf', 'Reinerequete102.pdf', 'Reineseance de cours n6.pdf', 'Centre', '623257841', 'ReineCahierCharge110.pdf', 'Reineseance de cours n6.pdf', '2024-07-12'),
(2, 'Test', 'Test', '2024-07-12', 1, 'F', '2024-07-12', 1, 1, 'C', 'Testcahier  charge.pdf', 'Testcahier  charge.pdf', 'Testcahier  charge.pdf', 'Centre', '633225578', 'Testcahier  charge.pdf', 'Testcahier  charge.pdf', '2024-07-12'),
(3, 'Chella', 'Roslyne', '2024-07-12', 1, 'F', '2024-07-12', 1, 1, 'TI', 'Chellacahier  charge.pdf', 'Chellacahier  charge.pdf', 'Chellacahier  charge.pdf', 'Ouest', '696121116', 'Chellacahier  charge.pdf', 'Chellacahier  charge.pdf', '2024-07-12'),
(5, 'Touko Tomta', 'Maximin Eden', '2024-07-12', 2, 'M', '2004-10-13', 1, 1, 'C', 'Touko Tomtarequete ICT102.pdf', 'Touko Tomtaseance de cours n6.pdf', 'Touko Tomtaseance de cours n6.pdf', 'Ouest', '699875441', 'Touko Tomtarequete ICT102.pdf', 'Touko Tomtarequete102.pdf', '2024-07-12'),
(4, 'Houakeu Kamguia', 'Brondon Jores', '2023-07-12', 1, 'M', '2005-10-19', 1, 1, 'TI', 'Houakeu Kamguiarequete ICT102.pdf', 'Houakeu Kamguiarequete ICT102.pdf', 'Houakeu Kamguiarequete ICT102.pdf', 'Ouest', '633221145', 'Houakeu Kamguiarequete ICT102.pdf', 'Houakeu Kamguiarequete ICT102.pdf', '2024-07-12'),
(6, 'Marie', 'Ange', '2024-07-12', 1, 'F', '2005-03-18', 1, 1, 'GCEAL', 'MarieExercice1.pdf', 'MarieExercice1.pdf', 'MarieExercice1.pdf', 'Sud', '698225792', 'MarieExercice1.pdf', 'MarieExercice1.pdf', '2024-07-12'),
(7, 'Houakeu ', 'Franck', '2024-07-13', 2, 'M', '1998-08-07', 1, 1, 'TI', 'Houakeu FICHE_DE_CONNEXION_JUILLET_2024.pdf', 'Houakeu FICHE_DE_CONNEXION_JUILLET_2024.pdf', 'Houakeu FICHE_DE_CONNEXION_JUILLET_2024.pdf', 'Ouest', '655452342', 'Houakeu FICHE_DE_CONNEXION_JUILLET_2024.pdf', 'Houakeu FICHE_DE_CONNEXION_JUILLET_2024.pdf', '2024-07-13'),
(8, 'Kemmogne', 'Armelle', '2024-07-13', 2, 'F', '1999-08-17', 1, 1, 'TI', 'KemmogneFICHE_DE_CONNEXION_JUILLET_2024.pdf', 'KemmogneFICHE_DE_CONNEXION_JUILLET_2024.pdf', 'KemmogneFICHE_DE_CONNEXION_JUILLET_2024.pdf', 'Ouest', '697275875', 'KemmogneFICHE_DE_CONNEXION_JUILLET_2024.pdf', 'KemmogneFICHE_DE_CONNEXION_JUILLET_2024.pdf', '2024-07-13');

-- --------------------------------------------------------

--
-- Structure de la table `redpondre`
--

DROP TABLE IF EXISTS `redpondre`;
CREATE TABLE IF NOT EXISTS `redpondre` (
  `Matricule_E` varchar(100) NOT NULL,
  `Id_reqetrep` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `reqetrep`
--

DROP TABLE IF EXISTS `reqetrep`;
CREATE TABLE IF NOT EXISTS `reqetrep` (
  `Id_req` int NOT NULL AUTO_INCREMENT,
  `Id_eval` int NOT NULL,
  `Matricule` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Nom_fichier` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Objet` varchar(100) NOT NULL,
  PRIMARY KEY (`Id_req`),
  KEY `requet2` (`Id_eval`),
  KEY `Matricule` (`Matricule`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `reqetrep`
--

INSERT INTO `reqetrep` (`Id_req`, `Id_eval`, `Matricule`, `Nom_fichier`, `Objet`) VALUES
(1, 39, '23U2497', '23U249739Exercice1.pdf', 'REQUETE NOTE DE TP ICT 106 HOUAKEU'),
(2, 3, '23U2497', '23U24973Exercice1.pdf', 'ERREUR NOTE DE TP ICT 103');

-- --------------------------------------------------------

--
-- Structure de la table `semestre`
--

DROP TABLE IF EXISTS `semestre`;
CREATE TABLE IF NOT EXISTS `semestre` (
  `Id_sm` int NOT NULL AUTO_INCREMENT,
  `NomS` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`Id_sm`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `semestre`
--

INSERT INTO `semestre` (`Id_sm`, `NomS`) VALUES
(1, 'Semestre1'),
(2, 'Semestre2');

-- --------------------------------------------------------

--
-- Structure de la table `typeeval`
--

DROP TABLE IF EXISTS `typeeval`;
CREATE TABLE IF NOT EXISTS `typeeval` (
  `Id_type` int NOT NULL AUTO_INCREMENT,
  `Nom_type` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`Id_type`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `typeeval`
--

INSERT INTO `typeeval` (`Id_type`, `Nom_type`) VALUES
(1, 'CC'),
(2, 'SN'),
(3, 'TP'),
(4, 'TD');

-- --------------------------------------------------------

--
-- Structure de la table `ue`
--

DROP TABLE IF EXISTS `ue`;
CREATE TABLE IF NOT EXISTS `ue` (
  `Id_UE` varchar(100) NOT NULL,
  `Nom_UE` varchar(100) DEFAULT NULL,
  `Id_sm` int NOT NULL,
  `Id_fil` int NOT NULL,
  PRIMARY KEY (`Id_UE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `ue`
--

INSERT INTO `ue` (`Id_UE`, `Nom_UE`, `Id_sm`, `Id_fil`) VALUES
('1', 'ICT103', 1, 1),
('10', 'ICT106', 2, 1),
('11', 'ENG102/FR102', 2, 1),
('12', 'ICT108', 2, 1),
('2', 'ICT107', 1, 1),
('3', 'ICT109', 1, 1),
('4', 'ICT101', 1, 1),
('5', 'ICT111', 1, 1),
('6', 'ICT105', 1, 1),
('7', 'ICT102', 2, 1),
('8', 'ICT110', 2, 1),
('9', 'ICT104', 2, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `devoir`
--
ALTER TABLE `devoir`
  ADD CONSTRAINT `devoir1` FOREIGN KEY (`Matricule`) REFERENCES `etudiant` (`Matricule`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `devoir2` FOREIGN KEY (`Id_eval`) REFERENCES `evaluation` (`Id_eval`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `enseignant`
--
ALTER TABLE `enseignant`
  ADD CONSTRAINT `UE_FK` FOREIGN KEY (`Id_UE`) REFERENCES `ue` (`Id_UE`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `participer`
--
ALTER TABLE `participer`
  ADD CONSTRAINT `participer_ibfk_1` FOREIGN KEY (`Id_eval`) REFERENCES `evaluation` (`Id_eval`),
  ADD CONSTRAINT `participer_ibfk_2` FOREIGN KEY (`Matricule`) REFERENCES `etudiant` (`Matricule`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `reqetrep`
--
ALTER TABLE `reqetrep`
  ADD CONSTRAINT `reqetrep_ibfk_1` FOREIGN KEY (`Matricule`) REFERENCES `etudiant` (`Matricule`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `requet2` FOREIGN KEY (`Id_eval`) REFERENCES `evaluation` (`Id_eval`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
