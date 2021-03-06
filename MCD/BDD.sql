-- ******************** Création de la base de donnée ******************** --

DROP DATABASE IF EXISTS filrouge;
CREATE DATABASE filrouge;
USE filrouge;

-- ******************** Fin Création de la base de donnée ******************** --




-- ******************** Création des Tables ******************** --

-- Catégorie
CREATE TABLE categorie(                                                               
   cat_id INT AUTO_INCREMENT,
   cat_nom VARCHAR(30),
   cat_id_1 INT,
   PRIMARY KEY(cat_id),
   FOREIGN KEY(cat_id_1) REFERENCES categorie(cat_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Poste
CREATE TABLE poste(                                                               
   pos_id INT AUTO_INCREMENT,
   pos_libelle VARCHAR(50),
   pos_description VARCHAR(50),
   PRIMARY KEY(pos_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Site
CREATE TABLE site(                                                               
   site_id INT AUTO_INCREMENT,
   site_nom VARCHAR(50),
   site_description VARCHAR(50),
   site_logo VARCHAR(50),
   site_url VARCHAR(50),
   site_siege_social VARCHAR(50),
   site_status VARCHAR(50),
   site_num_siret VARCHAR(50),
   site_rgpd VARCHAR(50),
   PRIMARY KEY(site_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Pays
CREATE TABLE pays(                                                               
   pay_id INT AUTO_INCREMENT,
   pay_libelle VARCHAR(50),
   PRIMARY KEY(pay_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Fournisseur
CREATE TABLE fournisseur(                                                               
   four_id INT,
   four_nom VARCHAR(30),
   four_adresse VARCHAR(50),
   four_ville VARCHAR(20),
   four_cp VARCHAR(5),
   four_tel VARCHAR(10),
   four_courriel VARCHAR(50),
   four_categorie VARCHAR(50),
   pay_id INT NOT NULL,
   PRIMARY KEY(four_id),
   FOREIGN KEY(pay_id) REFERENCES Pays(pay_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Utilisateur
CREATE TABLE utilisateur(                                                               
   util_id INT AUTO_INCREMENT,
   util_role VARCHAR(50),
   util_identifiant VARCHAR(50),
   util_mdp VARCHAR(50),
   util_mail VARCHAR(50),
   util_nom VARCHAR(50),
   util_prenom VARCHAR(50),
   util_adresse VARCHAR(50),
   util_adresse_suite VARCHAR(50),
   util_telephone VARCHAR(15),
   util_cp VARCHAR(10),
   util_sexe BOOLEAN,
   util_date_de_naissance DATE,
   site_id INT NOT NULL,
   PRIMARY KEY(util_id),
   FOREIGN KEY(site_id) REFERENCES Site(site_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Article
CREATE TABLE article(                                                               
   art_id INT AUTO_INCREMENT,
   art_photo VARCHAR(50),
   art_nom VARCHAR(30),
   art_libelle VARCHAR(30),
   art_prixht DECIMAL(15,2),
   art_min_stock DECIMAL(15,0),
   art_stock DECIMAL(15,0),
   four_id INT NOT NULL,
   cat_id INT NOT NULL,
   PRIMARY KEY(art_id),
   FOREIGN KEY(four_id) REFERENCES fournisseur(four_id),
   FOREIGN KEY(cat_id) REFERENCES categorie(cat_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Employe
CREATE TABLE employe(                                                               
   emp_id INT AUTO_INCREMENT,
   emp_pos_id INT,
   emp_emp_id INT,
   emp_date_entree DATETIME,
   emp_nom VARCHAR(50),
   emp_num_secu_social INT,
   emp_date_sortie DATETIME,
   emp_prenom VARCHAR(50),
   emp_sexe BOOLEAN,
   emp_date_de_naissance DATE,
   emp_adresse VARCHAR(50),
   emp_adresse_suite VARCHAR(50),
   emp_cp VARCHAR(10),
   emp_telephone VARCHAR(15),
   emp_ville VARCHAR(50),
   emp_cli_id VARCHAR(50),
   util_id INT NOT NULL,
   pos_id INT NOT NULL,
   emp_id_1 INT,
   PRIMARY KEY(emp_id),
   FOREIGN KEY(util_id) REFERENCES Utilisateur(util_id),
   FOREIGN KEY(pos_id) REFERENCES Poste(pos_id),
   FOREIGN KEY(emp_id_1) REFERENCES Employé(emp_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Client
CREATE TABLE client(                                                               
   cli_id INT AUTO_INCREMENT,
   cli_coef DECIMAL(15,0),
   cli_pro BOOLEAN,
   pay_id INT NOT NULL,
   util_id INT NOT NULL,
   type_id INT NOT NULL,
   emp_id INT NOT NULL,
   PRIMARY KEY(cli_id),
   FOREIGN KEY(pay_id) REFERENCES Pays(pay_id),
   FOREIGN KEY(util_id) REFERENCES Utilisateur(util_id),
   FOREIGN KEY(type_id) REFERENCES type_de_client(type_id),
   FOREIGN KEY(emp_id) REFERENCES Employé(emp_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Commande
CREATE TABLE commande(                                                               
   com_id INT AUTO_INCREMENT,
   com_num INT,
   com_date DATE,
   com_coef DECIMAL(15,0),
   com_totalht DECIMAL(15,0),
   com_type_de_paiement VARCHAR(50),
   com_reduc_commercial DECIMAL(2,0),
   cli_id INT NOT NULL,
   PRIMARY KEY(com_id),
   FOREIGN KEY(cli_id) REFERENCES client(cli_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Ligne de commande
CREATE TABLE lignedecommande(                                                               
   ligne_id INT AUTO_INCREMENT,
   ligne_prix DECIMAL(15,2),
   ligne_quantite DECIMAL(15,0),
   com_id INT NOT NULL,
   art_id INT NOT NULL,
   PRIMARY KEY(ligne_id),
   FOREIGN KEY(com_id) REFERENCES commande(com_id),
   FOREIGN KEY(art_id) REFERENCES article(art_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Facture
CREATE TABLE facture(                                                               
   fact_id INT AUTO_INCREMENT,
   fact_num INT,
   fact_prixht DECIMAL(15,2),
   fact_date DATE,
   fact_adresse_fact VARCHAR(50),
   fact_adresse_livraison VARCHAR(50),
   fact_prix_ttc DECIMAL(15,2),
   com_id INT NOT NULL,
   PRIMARY KEY(fact_id),
   UNIQUE(com_id),
   FOREIGN KEY(com_id) REFERENCES commande(com_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
-- ******************** Fin Création des Tables ******************** --