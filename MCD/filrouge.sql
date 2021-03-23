-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           10.5.8-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour filrouge
DROP DATABASE IF EXISTS `filrouge`;
CREATE DATABASE IF NOT EXISTS `filrouge` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `filrouge`;

-- Listage de la structure de la table filrouge. article
DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_id` int(11) DEFAULT NULL,
  `four_id` int(11) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `art_photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `art_nom` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `art_libelle` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `art_prix_ht` decimal(15,2) NOT NULL,
  `art_min_stock` smallint(6) NOT NULL,
  `art_stock` smallint(6) NOT NULL,
  `art_promo` tinyint(1) NOT NULL,
  `art_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`art_id`),
  KEY `cat_id` (`cat_id`),
  KEY `pro_id` (`pro_id`),
  KEY `four_id` (`four_id`),
  CONSTRAINT `FK_23A0E66C3B7E4BA` FOREIGN KEY (`pro_id`) REFERENCES `promotion` (`pro_id`),
  CONSTRAINT `FK_23A0E66E5AC00A4` FOREIGN KEY (`four_id`) REFERENCES `fournisseur` (`four_id`),
  CONSTRAINT `FK_23A0E66E6ADA943` FOREIGN KEY (`cat_id`) REFERENCES `categorie` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.article : ~7 rows (environ)
DELETE FROM `article`;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` (`art_id`, `pro_id`, `four_id`, `cat_id`, `art_photo`, `art_nom`, `art_libelle`, `art_prix_ht`, `art_min_stock`, `art_stock`, `art_promo`, `art_desc`) VALUES
	(2, NULL, 2, 14, 'piano.png', 'test', 'test', 10.00, 2, 5, 0, ''),
	(3, NULL, 4, 5, 'guitare.png', 'crayon', 'frfr', 20.00, 1, 2, 0, ''),
	(4, NULL, 4, 18, 'piano.png', 'taille', 'frfr', 20.00, 1, 2, 0, ''),
	(5, 2, 5, 18, 'guitare.png', 'regle', 'frfr', 20.00, 1, 3, 0, ''),
	(6, 2, 6, 8, 'piano.png', 'crayon', 'frfr', 20.00, 1, 3, 0, ''),
	(7, 2, 3, 19, 'guitare.png', 'crayon', 'frfr', 20.15, 2, 62, 0, ''),
	(8, 2, 4, 4, 'piano.png', 'crayon', 'frfr', 20.00, 1, 3, 0, '212414');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. categorie
DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id_1` int(11) DEFAULT NULL,
  `cat_nom` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `cat_id_1` (`cat_id_1`),
  CONSTRAINT `FK_497DD634597AB279` FOREIGN KEY (`cat_id_1`) REFERENCES `categorie` (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.categorie : ~69 rows (environ)
DELETE FROM `categorie`;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`cat_id`, `cat_id_1`, `cat_nom`) VALUES
	(1, NULL, 'Guitares'),
	(2, NULL, 'Pianos'),
	(3, NULL, 'Batteries'),
	(4, NULL, 'Synthés'),
	(5, NULL, 'Vents'),
	(6, NULL, 'Quatuor à cordes'),
	(7, NULL, 'Sonorisation'),
	(8, NULL, 'Deejay'),
	(9, 1, 'Guitares classiques'),
	(10, 1, 'Guitares électriques'),
	(11, 1, 'Guitares électro acoustiques'),
	(12, 1, 'Guitares pour gauchers'),
	(13, 1, 'Ukulélés'),
	(14, 2, 'Accordéons'),
	(15, 2, 'Banquettes clavier'),
	(16, 2, 'Claviers arrangeurs'),
	(17, 2, 'Claviers maîtres'),
	(18, 2, 'Housses clavier'),
	(19, 2, 'Orgues'),
	(20, 2, 'Pianos numériques'),
	(21, 3, 'Accessoires Batteries'),
	(22, 3, 'Batteries acoustiques'),
	(23, 3, 'Batteries electroniques'),
	(24, 3, 'Caisses claires'),
	(25, 3, 'Cymbales'),
	(26, 3, 'Percussions'),
	(27, 3, 'Percussions africaines'),
	(28, 3, 'Percussions brésiliennes'),
	(29, 3, 'Percussions orchestre'),
	(30, 3, 'Xylophones'),
	(31, 4, 'Accessoires synthétiseurs'),
	(32, 4, 'Boites à rythmes'),
	(33, 4, 'Groovebox/samplers'),
	(34, 4, 'Synthés analogiques'),
	(35, 4, 'Synthés numériques'),
	(36, 4, 'Workstations'),
	(37, 5, 'Accessoires vents'),
	(38, 5, 'Clarinettes'),
	(39, 5, 'Cors harmonie'),
	(40, 5, 'Flûtes à bec'),
	(41, 5, 'Flûtes traversières'),
	(42, 5, 'Gros cuivres'),
	(43, 5, 'Hautbois et bassons'),
	(44, 5, 'Instruments composite'),
	(45, 5, 'Saxophones'),
	(46, 5, 'Trombones'),
	(47, 5, 'Trompettes et cornets'),
	(48, 6, 'Accessoires quatuor'),
	(49, 6, 'Altos'),
	(50, 6, 'Contrebasses'),
	(51, 6, 'Violons'),
	(52, 6, 'Violoncelles'),
	(53, 7, 'Accessoires sonorisation'),
	(54, 7, 'Amplis de puissance'),
	(55, 7, 'Bose professional'),
	(56, 7, 'Enceintes actives'),
	(57, 7, 'Enceintes passives'),
	(58, 7, 'Kits et packs lumières'),
	(59, 7, 'Microphones'),
	(60, 7, 'Mixage et production'),
	(61, 7, 'Packs enceintes'),
	(62, 7, 'Périphériques analogiques'),
	(63, 7, 'Préamplificateurs studio'),
	(64, 8, 'Accessoires dj'),
	(65, 8, 'Casques'),
	(66, 8, 'Cellules et diamants'),
	(67, 8, 'Effets dj'),
	(68, 8, 'Karaoke'),
	(69, 8, 'Tables de mixage dj');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. commande
DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `uti_id` int(11) DEFAULT NULL,
  `com_num` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_date` datetime NOT NULL,
  `com_etat` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_total_ht` decimal(15,0) NOT NULL,
  `com_type_de_paiement` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `com_reduc_commercial` decimal(2,0) DEFAULT NULL,
  PRIMARY KEY (`com_id`),
  KEY `uti_id` (`uti_id`),
  CONSTRAINT `FK_6EEAA67D3951DF75` FOREIGN KEY (`uti_id`) REFERENCES `utilisateur` (`uti_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.commande : ~0 rows (environ)
DELETE FROM `commande`;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. doctrine_migration_versions
DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table filrouge.doctrine_migration_versions : ~2 rows (environ)
DELETE FROM `doctrine_migration_versions`;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
	('DoctrineMigrations\\Version20210315110541', '2021-03-15 11:05:48', 819),
	('DoctrineMigrations\\Version20210317094920', '2021-03-19 11:36:27', 632);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. employe
DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `uti_id` int(11) DEFAULT NULL,
  `pos_id` int(11) DEFAULT NULL,
  `emp_date_entree` datetime DEFAULT NULL,
  `emp_date_sortie` datetime DEFAULT NULL,
  `emp_num_secu_social` int(11) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `uti_id` (`uti_id`),
  KEY `pos_id` (`pos_id`),
  CONSTRAINT `FK_F804D3B93951DF75` FOREIGN KEY (`uti_id`) REFERENCES `utilisateur` (`uti_id`),
  CONSTRAINT `FK_F804D3B941085FAE` FOREIGN KEY (`pos_id`) REFERENCES `poste` (`pos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.employe : ~0 rows (environ)
DELETE FROM `employe`;
/*!40000 ALTER TABLE `employe` DISABLE KEYS */;
/*!40000 ALTER TABLE `employe` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. facture
DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `fact_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_id` int(11) DEFAULT NULL,
  `fact_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fact_prix_ht` decimal(15,2) NOT NULL,
  `fact_date` date DEFAULT NULL,
  `fact_prix_ttc` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`fact_id`),
  UNIQUE KEY `com_id` (`com_id`),
  CONSTRAINT `FK_FE866410748C0F37` FOREIGN KEY (`com_id`) REFERENCES `commande` (`com_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.facture : ~0 rows (environ)
DELETE FROM `facture`;
/*!40000 ALTER TABLE `facture` DISABLE KEYS */;
/*!40000 ALTER TABLE `facture` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. fournisseur
DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `four_id` int(11) NOT NULL AUTO_INCREMENT,
  `four_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pay_id` int(11) DEFAULT NULL,
  `four_nom` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `four_adresse` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `four_ville` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `four_cp` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `four_tel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `four_courriel` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`four_id`),
  KEY `pay_id` (`pay_id`),
  CONSTRAINT `FK_369ECA32918501AB` FOREIGN KEY (`pay_id`) REFERENCES `pays` (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.fournisseur : ~10 rows (environ)
DELETE FROM `fournisseur`;
/*!40000 ALTER TABLE `fournisseur` DISABLE KEYS */;
INSERT INTO `fournisseur` (`four_id`, `four_email`, `pay_id`, `four_nom`, `four_adresse`, `four_ville`, `four_cp`, `four_tel`, `four_courriel`) VALUES
	(1, 'Ut@temporlorem.ca', 56, 'Interdum Nunc Sollicitudin Incorporated', '9756 Sodales Route', 'Waren', '04370', '1-331-298-8548', NULL),
	(2, 'convallis.dolor@nec.co.uk', 78, 'Porttitor Consulting', '9782 Metus. Rd.', 'Fleurus', '12683', '749-3494', NULL),
	(3, 'libero@velvulputate.co.uk', 53, 'Mauris Industries', '132-3202 Ac Ave', 'Vanier', '8176', '1-687-498-7989', NULL),
	(4, 'Nulla.facilisi@vehicularisus.edu', 121, 'Dolor Donec Fringilla LLP', 'CP 414, 2655 Vitae Route', 'Acquafondata', '20903', '1-890-768-4067', NULL),
	(5, 'dui.Fusce@tempuseu.com', 58, 'Montes Foundation', '8332 Integer Impasse', 'Gatineau', '45802', '728-8279', NULL),
	(6, 'in.faucibus.orci@scelerisque.ca', 45, 'Volutpat Corp.', 'Appartement 656-8960 Massa. Av.', 'San Fele', 'Z7231', '1-246-226-1811', NULL),
	(7, 'dui.lectus.rutrum@nonloremvitae.edu', 63, 'Ornare Egestas Ligula Incorporated', 'Appartement 635-7449 Lorem Ave', 'Stafford', '21207', '1-839-284-5457', NULL),
	(8, 'ipsum@sapiengravida.org', 74, 'Ac LLP', 'CP 160, 4370 Vitae Route', 'Ramara', '6318', '596-2662', NULL),
	(9, 'nec.mollis@tacitisociosquad.org', 74, 'Dignissim Magna Limited', 'CP 706, 1445 Gravida. Chemin', 'Baricella', 'YC3X 2SJ', '163-7433', NULL),
	(10, 'ut.aliquam@Integeridmagna.com', 74, 'Augue LLP', 'Appartement 162-4103 Quisque Chemin', 'Aalen', 'Z4663', '941-8958', NULL);
/*!40000 ALTER TABLE `fournisseur` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. lignedecommande
DROP TABLE IF EXISTS `lignedecommande`;
CREATE TABLE IF NOT EXISTS `lignedecommande` (
  `ligne_id` int(11) NOT NULL AUTO_INCREMENT,
  `com_id` int(11) DEFAULT NULL,
  `art_id` int(11) DEFAULT NULL,
  `ligne_prix` decimal(15,2) DEFAULT NULL,
  `ligne_quantite` int(11) NOT NULL,
  PRIMARY KEY (`ligne_id`),
  KEY `com_id` (`com_id`),
  KEY `art_id` (`art_id`),
  CONSTRAINT `FK_A4C3DF16748C0F37` FOREIGN KEY (`com_id`) REFERENCES `commande` (`com_id`),
  CONSTRAINT `FK_A4C3DF168C25E51A` FOREIGN KEY (`art_id`) REFERENCES `article` (`art_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.lignedecommande : ~0 rows (environ)
DELETE FROM `lignedecommande`;
/*!40000 ALTER TABLE `lignedecommande` DISABLE KEYS */;
/*!40000 ALTER TABLE `lignedecommande` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. pays
DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_libelle` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.pays : ~241 rows (environ)
DELETE FROM `pays`;
/*!40000 ALTER TABLE `pays` DISABLE KEYS */;
INSERT INTO `pays` (`pay_id`, `pay_libelle`) VALUES
	(1, 'Andorre'),
	(2, 'Émirats Arabes Unis'),
	(3, 'Afghanistan'),
	(4, 'Antigua-et-Barbuda'),
	(5, 'Anguilla'),
	(6, 'Albanie'),
	(7, 'Arménie'),
	(8, 'Antilles Néerlandaises'),
	(9, 'Angola'),
	(10, 'Antarctique'),
	(11, 'Argentine'),
	(12, 'Samoa Américaines'),
	(13, 'Autriche'),
	(14, 'Australie'),
	(15, 'Aruba'),
	(16, 'Îles Åland'),
	(17, 'Azerbaïdjan'),
	(18, 'Bosnie-Herzégovine'),
	(19, 'Barbade'),
	(20, 'Bangladesh'),
	(21, 'Belgique'),
	(22, 'Burkina Faso'),
	(23, 'Bulgarie'),
	(24, 'Bahreïn'),
	(25, 'Burundi'),
	(26, 'Bénin'),
	(27, 'Bermudes'),
	(28, 'Brunéi Darussalam'),
	(29, 'Bolivie'),
	(30, 'Brésil'),
	(31, 'Bahamas'),
	(32, 'Bhoutan'),
	(33, 'Île Bouvet'),
	(34, 'Botswana'),
	(35, 'Bélarus'),
	(36, 'Belize'),
	(37, 'Canada'),
	(38, 'Îles Cocos (Keeling)'),
	(39, 'République Démocratique du Congo'),
	(40, 'République Centrafricaine'),
	(41, 'République du Congo'),
	(42, 'Suisse'),
	(43, 'Côte d\'Ivoire'),
	(44, 'Îles Cook'),
	(45, 'Chili'),
	(46, 'Cameroun'),
	(47, 'Chine'),
	(48, 'Colombie'),
	(49, 'Costa Rica'),
	(50, 'Serbie-et-Monténégro'),
	(51, 'Cuba'),
	(52, 'Cap-vert'),
	(53, 'Île Christmas'),
	(54, 'Chypre'),
	(55, 'République Tchèque'),
	(56, 'Allemagne'),
	(57, 'Djibouti'),
	(58, 'Danemark'),
	(59, 'Dominique'),
	(60, 'République Dominicaine'),
	(61, 'Algérie'),
	(62, 'Équateur'),
	(63, 'Estonie'),
	(64, 'Égypte'),
	(65, 'Sahara Occidental'),
	(66, 'Érythrée'),
	(67, 'Espagne'),
	(68, 'Éthiopie'),
	(69, 'Finlande'),
	(70, 'Fidji'),
	(71, 'Îles (malvinas) Falkland'),
	(72, 'États Fédérés de Micronésie'),
	(73, 'Îles Féroé'),
	(74, 'France'),
	(75, 'Gabon'),
	(76, 'Royaume-Uni'),
	(77, 'Grenade'),
	(78, 'Géorgie'),
	(79, 'Guyane Française'),
	(80, 'Ghana'),
	(81, 'Gibraltar'),
	(82, 'Groenland'),
	(83, 'Gambie'),
	(84, 'Guinée'),
	(85, 'Guadeloupe'),
	(86, 'Guinée Équatoriale'),
	(87, 'Grèce'),
	(88, 'Géorgie du Sud et les Îles Sandwich du Sud'),
	(89, 'Guatemala'),
	(90, 'Guam'),
	(91, 'Guinée-Bissau'),
	(92, 'Guyana'),
	(93, 'Hong-Kong'),
	(94, 'Îles Heard et Mcdonald'),
	(95, 'Honduras'),
	(96, 'Croatie'),
	(97, 'Haïti'),
	(98, 'Hongrie'),
	(99, 'Indonésie'),
	(100, 'Irlande'),
	(101, 'Israël'),
	(102, 'Île de Man'),
	(103, 'Inde'),
	(104, 'Territoire Britannique de l\'Océan Indien'),
	(105, 'Iraq'),
	(106, 'République Islamique d\'Iran'),
	(107, 'Islande'),
	(108, 'Italie'),
	(109, 'Jamaïque'),
	(110, 'Jordanie'),
	(111, 'Japon'),
	(112, 'Kenya'),
	(113, 'Kirghizistan'),
	(114, 'Cambodge'),
	(115, 'Kiribati'),
	(116, 'Comores'),
	(117, 'Saint-Kitts-et-Nevis'),
	(118, 'République Populaire Démocratique de Corée'),
	(119, 'République de Corée'),
	(120, 'Koweït'),
	(121, 'Îles Caïmanes'),
	(122, 'Kazakhstan'),
	(123, 'République Démocratique Populaire Lao'),
	(124, 'Liban'),
	(125, 'Sainte-Lucie'),
	(126, 'Liechtenstein'),
	(127, 'Sri Lanka'),
	(128, 'Libéria'),
	(129, 'Lesotho'),
	(130, 'Lituanie'),
	(131, 'Luxembourg'),
	(132, 'Lettonie'),
	(133, 'Jamahiriya Arabe Libyenne'),
	(134, 'Maroc'),
	(135, 'Monaco'),
	(136, 'République de Moldova'),
	(137, 'Madagascar'),
	(138, 'Îles Marshall'),
	(139, 'L\'ex-République Yougoslave de Macédoine'),
	(140, 'Mali'),
	(141, 'Myanmar'),
	(142, 'Mongolie'),
	(143, 'Macao'),
	(144, 'Îles Mariannes du Nord'),
	(145, 'Martinique'),
	(146, 'Mauritanie'),
	(147, 'Montserrat'),
	(148, 'Malte'),
	(149, 'Maurice'),
	(150, 'Maldives'),
	(151, 'Malawi'),
	(152, 'Mexique'),
	(153, 'Malaisie'),
	(154, 'Mozambique'),
	(155, 'Namibie'),
	(156, 'Nouvelle-Calédonie'),
	(157, 'Niger'),
	(158, 'Île Norfolk'),
	(159, 'Nigéria'),
	(160, 'Nicaragua'),
	(161, 'Pays-Bas'),
	(162, 'Norvège'),
	(163, 'Népal'),
	(164, 'Nauru'),
	(165, 'Niué'),
	(166, 'Nouvelle-Zélande'),
	(167, 'Oman'),
	(168, 'Panama'),
	(169, 'Pérou'),
	(170, 'Polynésie Française'),
	(171, 'Papouasie-Nouvelle-Guinée'),
	(172, 'Philippines'),
	(173, 'Pakistan'),
	(174, 'Pologne'),
	(175, 'Saint-Pierre-et-Miquelon'),
	(176, 'Pitcairn'),
	(177, 'Porto Rico'),
	(178, 'Territoire Palestinien Occupé'),
	(179, 'Portugal'),
	(180, 'Palaos'),
	(181, 'Paraguay'),
	(182, 'Qatar'),
	(183, 'Réunion'),
	(184, 'Roumanie'),
	(185, 'Fédération de Russie'),
	(186, 'Rwanda'),
	(187, 'Arabie Saoudite'),
	(188, 'Îles Salomon'),
	(189, 'Seychelles'),
	(190, 'Soudan'),
	(191, 'Suède'),
	(192, 'Singapour'),
	(193, 'Sainte-Hélène'),
	(194, 'Slovénie'),
	(195, 'Svalbard etÎle Jan Mayen'),
	(196, 'Slovaquie'),
	(197, 'Sierra Leone'),
	(198, 'Saint-Marin'),
	(199, 'Sénégal'),
	(200, 'Somalie'),
	(201, 'Suriname'),
	(202, 'Sao Tomé-et-Principe'),
	(203, 'El Salvador'),
	(204, 'République Arabe Syrienne'),
	(205, 'Swaziland'),
	(206, 'Îles Turks et Caïques'),
	(207, 'Tchad'),
	(208, 'Terres Australes Françaises'),
	(209, 'Togo'),
	(210, 'Thaïlande'),
	(211, 'Tadjikistan'),
	(212, 'Tokelau'),
	(213, 'Timor-Leste'),
	(214, 'Turkménistan'),
	(215, 'Tunisie'),
	(216, 'Tonga'),
	(217, 'Turquie'),
	(218, 'Trinité-et-Tobago'),
	(219, 'Tuvalu'),
	(220, 'Taïwan'),
	(221, 'République-Unie de Tanzanie'),
	(222, 'Ukraine'),
	(223, 'Ouganda'),
	(224, 'Îles Mineures Éloignées des États-Unis'),
	(225, 'États-Unis'),
	(226, 'Uruguay'),
	(227, 'Ouzbékistan'),
	(228, 'Saint-Siège (état de la Cité du Vatican)'),
	(229, 'Saint-Vincent-et-les Grenadines'),
	(230, 'Venezuela'),
	(231, 'Îles Vierges Britanniques'),
	(232, 'Îles Vierges des États-Unis'),
	(233, 'Viet Nam'),
	(234, 'Vanuatu'),
	(235, 'Wallis et Futuna'),
	(236, 'Samoa'),
	(237, 'Yémen'),
	(238, 'Mayotte'),
	(239, 'Afrique du Sud'),
	(240, 'Zambie'),
	(241, 'Zimbabwe');
/*!40000 ALTER TABLE `pays` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. poste
DROP TABLE IF EXISTS `poste`;
CREATE TABLE IF NOT EXISTS `poste` (
  `pos_id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_libelle` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pos_description` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`pos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.poste : ~0 rows (environ)
DELETE FROM `poste`;
/*!40000 ALTER TABLE `poste` DISABLE KEYS */;
/*!40000 ALTER TABLE `poste` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. promotion
DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `pro_id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_coef` int(11) NOT NULL DEFAULT 0,
  `pro_date_debut` datetime NOT NULL,
  `pro_date_fin` datetime NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.promotion : ~0 rows (environ)
DELETE FROM `promotion`;
/*!40000 ALTER TABLE `promotion` DISABLE KEYS */;
INSERT INTO `promotion` (`pro_id`, `pro_coef`, `pro_date_debut`, `pro_date_fin`) VALUES
	(2, 0, '2016-01-01 00:00:00', '2016-01-01 00:00:00');
/*!40000 ALTER TABLE `promotion` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. utilisateur
DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `uti_id` int(11) NOT NULL AUTO_INCREMENT,
  `uti_adresse` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uti_adresse2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uti_ville` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uti_codepostal` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uti_nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uti_role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `uti_prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uti_sexe` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uti_date_de_naissance` date NOT NULL,
  `uti_mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uti_tel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uti_id_1` int(11) DEFAULT NULL,
  `pay_id` int(11) DEFAULT NULL,
  `uti_identifiant` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uti_mdp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`uti_id`),
  UNIQUE KEY `UNIQ_1D1C63B374C1F655` (`uti_identifiant`,`uti_mail`) USING BTREE,
  KEY `pay_id` (`pay_id`),
  KEY `uti_id_1` (`uti_id_1`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.utilisateur : ~8 rows (environ)
DELETE FROM `utilisateur`;
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
