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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `art_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `art_nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `art_libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `art_prix_ht` decimal(10,2) NOT NULL,
  `art_min_stock` int(11) NOT NULL,
  `art_stock` int(11) NOT NULL,
  `art_promo` tinyint(1) NOT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `four_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_article_promotion` (`pro_id`),
  KEY `FK_article_fournisseur` (`four_id`),
  KEY `FK_article_categorie` (`cat_id`),
  CONSTRAINT `FK_article_categorie` FOREIGN KEY (`cat_id`) REFERENCES `categorie` (`id`),
  CONSTRAINT `FK_article_fournisseur` FOREIGN KEY (`four_id`) REFERENCES `fournisseur` (`id`),
  CONSTRAINT `FK_article_promotion` FOREIGN KEY (`pro_id`) REFERENCES `promotion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.article : ~0 rows (environ)
DELETE FROM `article`;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
/*!40000 ALTER TABLE `article` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. categorie
DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_sup_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_categorie_categorie` (`cat_sup_id`),
  CONSTRAINT `FK_categorie_categorie` FOREIGN KEY (`cat_sup_id`) REFERENCES `categorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.categorie : ~69 rows (environ)
DELETE FROM `categorie`;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`id`, `cat_nom`, `cat_sup_id`) VALUES
	(1, 'Guitares', NULL),
	(2, 'Pianos', NULL),
	(3, 'Batteries', NULL),
	(4, 'Synthés', NULL),
	(5, 'Vents', NULL),
	(6, 'Quatuor à cordes', NULL),
	(7, 'Sonorisation', NULL),
	(8, 'Deejay', NULL),
	(9, 'Guitares classiques', 1),
	(10, 'Guitares électriques', 1),
	(11, 'Guitares électro acoustiques', 1),
	(12, 'Guitares pour gauchers', 1),
	(13, 'Ukulélés', 1),
	(14, 'Accordéons', 2),
	(15, 'Banquettes clavier', 2),
	(16, 'Claviers arrangeurs', 2),
	(17, 'Claviers maîtres', 2),
	(18, 'Housses clavier', 2),
	(19, 'Orgues', 2),
	(20, 'Pianos numériques', 2),
	(21, 'Accessoires Batteries', 3),
	(22, 'Batteries acoustiques', 3),
	(23, 'Batteries electroniques', 3),
	(24, 'Caisses claires', 3),
	(25, 'Cymbales', 3),
	(26, 'Percussions', 3),
	(27, 'Percussions africaines', 3),
	(28, 'Percussions brésiliennes', 3),
	(29, 'Percussions orchestre', 3),
	(30, 'Xylophones', 3),
	(31, 'Accessoires synthétiseurs', 4),
	(32, 'Boites à rythmes', 4),
	(33, 'Groovebox/samplers', 4),
	(34, 'Synthés analogiques', 4),
	(35, 'Synthés numériques', 4),
	(36, 'Workstations', 4),
	(37, 'Accessoires vents', 5),
	(38, 'Clarinettes', 5),
	(39, 'Cors harmonie', 5),
	(40, 'Flûtes à bec', 5),
	(41, 'Flûtes traversières', 5),
	(42, 'Gros cuivres', 5),
	(43, 'Hautbois et bassons', 5),
	(44, 'Instruments composite', 5),
	(45, 'Saxophones', 5),
	(46, 'Trombones', 5),
	(47, 'Trompettes et cornets', 5),
	(48, 'Accessoires quatuor', 6),
	(49, 'Altos', 6),
	(50, 'Contrebasses', 6),
	(51, 'Violons', 6),
	(52, 'Violoncelles', 6),
	(53, 'Accessoires sonorisation', 7),
	(54, 'Amplis de puissance', 7),
	(55, 'Bose professional', 7),
	(56, 'Enceintes actives', 7),
	(57, 'Enceintes passives', 7),
	(58, 'Kits et packs lumières', 7),
	(59, 'Microphones', 7),
	(60, 'Mixage et production', 7),
	(61, 'Packs enceintes', 7),
	(62, 'Périphériques analogiques', 7),
	(63, 'Préamplificateurs studio', 7),
	(64, 'Accessoires dj', 8),
	(65, 'Casques', 8),
	(66, 'Cellules et diamants', 8),
	(67, 'Effets dj', 8),
	(68, 'Karaoke', 8),
	(69, 'Tables de mixage dj', 8);
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. client
DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cli_nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_identifiant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_mdp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_sexe` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `cli_date_naissance` date NOT NULL,
  `cli_coef` decimal(2,2) DEFAULT NULL,
  `cli_client_pro` tinyint(1) NOT NULL,
  `cli_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coo_id` int(11) NOT NULL,
  `emp_id` int(11) NOT NULL,
  `pay_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_client_coordonnee` (`coo_id`),
  KEY `FK_client_employe` (`emp_id`),
  KEY `FK_client_pays` (`pay_id`),
  CONSTRAINT `FK_client_coordonnee` FOREIGN KEY (`coo_id`) REFERENCES `coordonnee` (`id`),
  CONSTRAINT `FK_client_employe` FOREIGN KEY (`emp_id`) REFERENCES `employe` (`id`),
  CONSTRAINT `FK_client_pays` FOREIGN KEY (`pay_id`) REFERENCES `pays` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.client : ~10 rows (environ)
DELETE FROM `client`;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`id`, `cli_nom`, `cli_prenom`, `cli_identifiant`, `cli_mdp`, `cli_sexe`, `cli_date_naissance`, `cli_coef`, `cli_client_pro`, `cli_email`, `cli_tel`, `coo_id`, `emp_id`, `pay_id`) VALUES
	(1, 'Keefe', 'George', 'VBG64UZU1LP', 'JOU42KUH1AS', 'H', '1992-01-08', NULL, 1, 'mattis.velit.justo@Etiam.ca', '575-7470', 1, 15, 56),
	(2, 'Ivy', 'Kirk', 'AHQ46RBY3DL', 'JVA88JXY0VM', 'F', '1987-10-27', NULL, 0, 'libero.Proin@Sedeget.co.uk', '1-988-227-7612', 2, 16, 3),
	(3, 'Alden', 'Yardley', 'XLD78SQH7SQ', 'QEK03LVE9EA', 'H', '1990-03-23', NULL, 1, 'at.velit@eget.net', '326-4748', 3, 17, 7),
	(4, 'Keelie', 'Paula', 'XAJ56WRR6MM', 'IIY09VIA7KR', 'F', '1994-08-04', NULL, 0, 'In.lorem@ascelerisque.com', '163-3915', 4, 18, 14),
	(5, 'Ahmed', 'Shelly', 'TJQ75QGG4PM', 'ALN88KXL1XA', 'F', '2000-12-18', NULL, 1, 'Sed.diam@malesuada.edu', '1-642-246-3677', 1, 19, 20),
	(6, 'Magee', 'Garth', 'JVI00QYT1PN', 'PIJ06CRQ6SK', 'H', '1994-01-17', NULL, 0, 'luctus@quamCurabiturvel.com', '231-8262', 2, 20, 30),
	(7, 'Faith', 'Breanna', 'DIC73LCE3EU', 'KMJ85LUN3AK', 'F', '1987-08-15', NULL, 0, 'quis.massa.Mauris@iaculisnec.org', '1-521-343-0536', 5, 17, 47),
	(8, 'Wilma', 'Genevieve', 'JPR57QZW2FU', 'PTP68SMT9DJ', 'F', '1993-09-06', NULL, 0, 'imperdiet@a.org', '878-8156', 6, 13, 67),
	(9, 'Kelsie', 'Kristen', 'VUR25RKY9LX', 'KUJ17ZJQ6MF', 'F', '1980-11-10', NULL, 0, 'sed@semsempererat.co.uk', '595-2386', 7, 14, 74),
	(10, 'Jesse', 'Ryan', 'IBX05GRJ9HN', 'OUN87PTT6ET', 'H', '2000-11-09', NULL, 0, 'semper.Nam.tempor@nectempus.ca', '1-906-261-9972', 8, 11, 74);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. commande
DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `com_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_date` datetime NOT NULL,
  `com_etat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_total_ht` decimal(10,2) NOT NULL,
  `com_type_paiement` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_reduc_commerciale` decimal(2,2) DEFAULT NULL,
  `cli_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_commande_client` (`cli_id`),
  CONSTRAINT `FK_commande_client` FOREIGN KEY (`cli_id`) REFERENCES `client` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.commande : ~0 rows (environ)
DELETE FROM `commande`;
/*!40000 ALTER TABLE `commande` DISABLE KEYS */;
/*!40000 ALTER TABLE `commande` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. coordonnee
DROP TABLE IF EXISTS `coordonnee`;
CREATE TABLE IF NOT EXISTS `coordonnee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `coo_adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coo_adresse_suite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coo_ville` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coo_cp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coo_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.coordonnee : ~10 rows (environ)
DELETE FROM `coordonnee`;
/*!40000 ALTER TABLE `coordonnee` DISABLE KEYS */;
INSERT INTO `coordonnee` (`id`, `coo_adresse`, `coo_adresse_suite`, `coo_ville`, `coo_cp`, `coo_type`) VALUES
	(1, '422-3466 Sagittis. Avenue', NULL, 'El Tambo', '9946 KZ', 'Livraison'),
	(2, 'Appartement 981-2401 Ipsum Ave', NULL, 'Valuyki', '5039', 'Livraison'),
	(3, '243-5393 Augue Ave', NULL, 'San Felipe', '93083-05713', 'Livraison'),
	(4, 'Appartement 712-7043 Pretium Avenue', NULL, 'South Portland', '6377', 'Livraison'),
	(5, '4581 Gravida Ave', NULL, 'Kurnool', 'P0G 1Z2', 'Livraison'),
	(6, '851-7104 Sit Av.', NULL, 'Kidderminster', '05324', 'Livraison'),
	(7, '190-9446 Ante Chemin', NULL, 'Dessel', '14818', 'Livraison'),
	(8, 'Appartement 948-8121 Lacus. Impasse', NULL, 'Juliaca', '9931', 'Livraison'),
	(9, 'Appartement 451-2206 Orci Rd.', NULL, 'Córdoba', '7161', 'Facturation'),
	(10, '834-6514 Purus, Rue', NULL, 'Jamshoro', '71272', 'Facturation');
/*!40000 ALTER TABLE `coordonnee` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. employe
DROP TABLE IF EXISTS `employe`;
CREATE TABLE IF NOT EXISTS `employe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_date_entree` datetime NOT NULL,
  `emp_date_sortie` datetime DEFAULT NULL,
  `emp_num_secu_social` int(11) NOT NULL,
  `emp_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_id` int(11) NOT NULL,
  `emp_pos_id` int(11) DEFAULT NULL,
  `coo_id` int(11) NOT NULL,
  `emp_mdp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_sexe` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emp_prenom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_employe_poste` (`pos_id`),
  KEY `FK_employe_employe` (`emp_pos_id`),
  KEY `FK_employe_coordonnee` (`coo_id`),
  CONSTRAINT `FK_employe_coordonnee` FOREIGN KEY (`coo_id`) REFERENCES `coordonnee` (`id`),
  CONSTRAINT `FK_employe_employe` FOREIGN KEY (`emp_pos_id`) REFERENCES `employe` (`id`),
  CONSTRAINT `FK_employe_poste` FOREIGN KEY (`pos_id`) REFERENCES `poste` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.employe : ~10 rows (environ)
DELETE FROM `employe`;
/*!40000 ALTER TABLE `employe` DISABLE KEYS */;
INSERT INTO `employe` (`id`, `emp_date_entree`, `emp_date_sortie`, `emp_num_secu_social`, `emp_email`, `emp_tel`, `pos_id`, `emp_pos_id`, `coo_id`, `emp_mdp`, `emp_sexe`, `emp_nom`, `emp_prenom`) VALUES
	(11, '2021-01-07 00:00:00', NULL, 340814206, 'dolor.tempus.non@tincidunt.edu', '1-482-112-7840', 1, NULL, 1, 'JUV26SKU3RF', 'F', 'Austin', 'Aurora'),
	(12, '2020-10-04 00:00:00', NULL, 606399733, 'Sed.eu@utaliquam.net', '566-0837', 5, 11, 2, 'SRI85UMK7FU', 'F', 'Rhoda', 'India'),
	(13, '2020-07-27 00:00:00', NULL, 873564156, 'tempor@auctor.edu', '1-181-373-1953', 6, 11, 3, 'QTD33KKR2MY', 'F', 'Dexter', 'Grace'),
	(14, '2020-08-19 00:00:00', NULL, 894495887, 'eu@loremDonecelementum.org', '591-5409', 4, 11, 4, 'FOL82HAT8AV', 'H', 'Knox', 'Zachery'),
	(15, '2021-12-04 00:00:00', NULL, 202801658, 'blandit.congue.In@ullamcorper.com', '902-3079', 2, 11, 5, 'AMG59ERS5IH', 'F', 'Leo', 'Bertha'),
	(16, '2021-05-11 00:00:00', NULL, 351911085, 'metus@natoquepenatibus.co.uk', '776-8865', 3, 11, 6, 'NQW70RFK3CD', 'H', 'Wang', 'Mara'),
	(17, '2021-02-03 00:00:00', NULL, 569048452, 'orci@egestasligulaNullam.co.uk', '1-515-791-2307', 5, 11, 7, 'PUN33ASA5JZ', 'F', 'Jane', 'Aphrodite'),
	(18, '2020-05-17 00:00:00', NULL, 299881052, 'Integer@quis.org', '1-698-481-4049', 7, 11, 8, 'DVU83KZM1JE', 'H', 'Jacqueline', 'Paul'),
	(19, '2020-07-07 00:00:00', NULL, 73839888, 'interdum@arcu.ca', '1-102-186-3526', 7, 11, 1, 'EEE64BAB9JK', 'F', 'Jocelyn', 'Kirby'),
	(20, '2020-06-27 00:00:00', NULL, 693936706, 'non.justo@Suspendissetristiqueneque.org', '1-451-760-3655', 7, 11, 2, 'YWE40HJT7XS', 'H', 'Mallory', 'Gillian');
/*!40000 ALTER TABLE `employe` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. facture
DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fact_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fact_prix_ht` decimal(10,2) NOT NULL,
  `fact_date` datetime NOT NULL,
  `fact_prix_ttc` decimal(10,2) NOT NULL,
  `com_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_facture_commande` (`com_id`),
  CONSTRAINT `FK_facture_commande` FOREIGN KEY (`com_id`) REFERENCES `commande` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.facture : ~0 rows (environ)
DELETE FROM `facture`;
/*!40000 ALTER TABLE `facture` DISABLE KEYS */;
/*!40000 ALTER TABLE `facture` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. fournisseur
DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `four_nom` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `four_adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `four_ville` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `four_cp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `four_tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `four_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_fournisseur_pays` (`pay_id`),
  CONSTRAINT `FK_fournisseur_pays` FOREIGN KEY (`pay_id`) REFERENCES `pays` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.fournisseur : ~10 rows (environ)
DELETE FROM `fournisseur`;
/*!40000 ALTER TABLE `fournisseur` DISABLE KEYS */;
INSERT INTO `fournisseur` (`id`, `four_nom`, `four_adresse`, `four_ville`, `four_cp`, `four_tel`, `four_email`, `pay_id`) VALUES
	(1, 'Interdum Nunc Sollicitudin Incorporated', '9756 Sodales Route', 'Waren', '04370', '1-331-298-8548', 'Ut@temporlorem.ca', 56),
	(2, 'Porttitor Consulting', '9782 Metus. Rd.', 'Fleurus', '12683', '749-3494', 'convallis.dolor@nec.co.uk', 78),
	(3, 'Mauris Industries', '132-3202 Ac Ave', 'Vanier', '8176', '1-687-498-7989', 'libero@velvulputate.co.uk', 53),
	(4, 'Dolor Donec Fringilla LLP', 'CP 414, 2655 Vitae Route', 'Acquafondata', '20903', '1-890-768-4067', 'Nulla.facilisi@vehicularisus.edu', 121),
	(5, 'Montes Foundation', '8332 Integer Impasse', 'Gatineau', '45802', '728-8279', 'dui.Fusce@tempuseu.com', 58),
	(6, 'Volutpat Corp.', 'Appartement 656-8960 Massa. Av.', 'San Fele', 'Z7231', '1-246-226-1811', 'in.faucibus.orci@scelerisque.ca', 45),
	(7, 'Ornare Egestas Ligula Incorporated', 'Appartement 635-7449 Lorem Ave', 'Stafford', '21207', '1-839-284-5457', 'dui.lectus.rutrum@nonloremvitae.edu', 63),
	(8, 'Ac LLP', 'CP 160, 4370 Vitae Route', 'Ramara', '6318', '596-2662', 'ipsum@sapiengravida.org', 74),
	(9, 'Dignissim Magna Limited', 'CP 706, 1445 Gravida. Chemin', 'Baricella', 'YC3X 2SJ', '163-7433', 'nec.mollis@tacitisociosquad.org', 74),
	(10, 'Augue LLP', 'Appartement 162-4103 Quisque Chemin', 'Aalen', 'Z4663', '941-8958', 'ut.aliquam@Integeridmagna.com', 74);
/*!40000 ALTER TABLE `fournisseur` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. ligne_de_commande
DROP TABLE IF EXISTS `ligne_de_commande`;
CREATE TABLE IF NOT EXISTS `ligne_de_commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ligne_prix` decimal(10,2) NOT NULL,
  `ligne_quantite` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `art_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ligne_de_commande_commande` (`com_id`),
  KEY `FK_ligne_de_commande_article` (`art_id`),
  CONSTRAINT `FK_ligne_de_commande_article` FOREIGN KEY (`art_id`) REFERENCES `article` (`id`),
  CONSTRAINT `FK_ligne_de_commande_commande` FOREIGN KEY (`com_id`) REFERENCES `commande` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.ligne_de_commande : ~0 rows (environ)
DELETE FROM `ligne_de_commande`;
/*!40000 ALTER TABLE `ligne_de_commande` DISABLE KEYS */;
/*!40000 ALTER TABLE `ligne_de_commande` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. pays
DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_libelle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.pays : ~241 rows (environ)
DELETE FROM `pays`;
/*!40000 ALTER TABLE `pays` DISABLE KEYS */;
INSERT INTO `pays` (`id`, `pay_libelle`) VALUES
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_libelle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.poste : ~7 rows (environ)
DELETE FROM `poste`;
/*!40000 ALTER TABLE `poste` DISABLE KEYS */;
INSERT INTO `poste` (`id`, `pos_libelle`, `pos_description`) VALUES
	(1, 'Président', 'Il dirige l\'entreprise'),
	(2, 'Vice président', 'Il aide à gérer l\'entreprise avec le président'),
	(3, 'Comptable', 'Il gère les finances de l\'entreprise'),
	(4, 'Ressource humaine', 'Il s\'occupe des informations liée aux employés'),
	(5, 'Recherche et développement', 'Cette section s\'occupe des innovations'),
	(6, 'Responsable marketing', 'Il gère la communication et les promotions des produits'),
	(7, 'Responsable informatique', 'Il gère le site, et le tient à jour');
/*!40000 ALTER TABLE `poste` ENABLE KEYS */;

-- Listage de la structure de la table filrouge. promotion
DROP TABLE IF EXISTS `promotion`;
CREATE TABLE IF NOT EXISTS `promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pro_coef` decimal(2,2) NOT NULL,
  `pro_date_debut` datetime NOT NULL,
  `pro_date_fin` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table filrouge.promotion : ~0 rows (environ)
DELETE FROM `promotion`;
/*!40000 ALTER TABLE `promotion` DISABLE KEYS */;
/*!40000 ALTER TABLE `promotion` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
