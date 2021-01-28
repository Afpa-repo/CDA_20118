CREATE DATABASE filrouge; USE filrouge;

CREATE TABLE fournisseur(
   Id_fournisseur INT,
   nom_fournisseur VARCHAR(30),
   adresse_fournisseur VARCHAR(50),
   ville_fournisseur VARCHAR(20),
   cp_fournisseur VARCHAR(5),
   tel_fournisseur VARCHAR(10),
   courriel_fournisseur VARCHAR(50),
   pays_fournisseur VARCHAR(30),
   categorie_fournisseur VARCHAR(50),
   PRIMARY KEY(Id_fournisseur)
);

CREATE TABLE commercial(
   Id_commercial INT,
   nom_commercial VARCHAR(30),
   prenom_commercial VARCHAR(30),
   tel_commercial VARCHAR(10),
   courriel_commercial VARCHAR(50),
   PRIMARY KEY(Id_commercial)
);

CREATE TABLE categorie(
   Id_categorie INT AUTO_INCREMENT,
   categorie VARCHAR(30),
   sous_categorie VARCHAR(50),
   Id_categorie_1 INT NOT NULL,
   PRIMARY KEY(Id_categorie),
   FOREIGN KEY(Id_categorie_1) REFERENCES categorie(Id_categorie)
);

CREATE TABLE typeDeClient(
   Idtypedeclient INT AUTO_INCREMENT,
   cat_client VARCHAR(30),
   coef_client DECIMAL(15,0),
   PRIMARY KEY(Idtypedeclient)
);

CREATE TABLE article(
   ref_article VARCHAR(20),
   photo_article VARCHAR(50),
   nom_article VARCHAR(30),
   lib_article VARCHAR(30),
   prixht_article DECIMAL(15,2),
   four_article VARCHAR(50),
   minstk_article DECIMAL(15,0),
   reelstk_article DECIMAL(15,0),
   Id_fournisseur INT NOT NULL,
   Id_categorie INT NOT NULL,
   PRIMARY KEY(ref_article),
   FOREIGN KEY(Id_fournisseur) REFERENCES fournisseur(Id_fournisseur),
   FOREIGN KEY(Id_categorie) REFERENCES categorie(Id_categorie)
);

CREATE TABLE client(
   Id_client INT,
   nom_client VARCHAR(30),
   prenom_client VARCHAR(30),
   adresse_client VARCHAR(50),
   ville_client VARCHAR(20),
   coef_client DECIMAL(15,0),
   cp_client VARCHAR(5),
   cat_client DECIMAL(2,0),
   Idtypedeclient INT NOT NULL,
   Id_commercial INT NOT NULL,
   PRIMARY KEY(Id_client),
   FOREIGN KEY(Idtypedeclient) REFERENCES typeDeClient(Idtypedeclient),
   FOREIGN KEY(Id_commercial) REFERENCES commercial(Id_commercial)
);

CREATE TABLE commande(
   Id_com INT,
   num_bl_com INT,
   date_com DATE,
   coef_com DECIMAL(15,0),
   totalprixht_com DECIMAL(15,0),
   typeDePayement_com VARCHAR(50),
   reduc_commercial_com DECIMAL(2,0),
   Id_client INT NOT NULL,
   PRIMARY KEY(Id_com),
   FOREIGN KEY(Id_client) REFERENCES client(Id_client)
);

CREATE TABLE lignedecommande(
   Id_lignedecommande INT AUTO_INCREMENT,
   prix_lignedecommande DECIMAL(15,2),
   qte_lignedecommande DECIMAL(15,0),
   Id_com INT NOT NULL,
   ref_article VARCHAR(20) NOT NULL,
   PRIMARY KEY(Id_lignedecommande),
   FOREIGN KEY(Id_com) REFERENCES commande(Id_com),
   FOREIGN KEY(ref_article) REFERENCES article(ref_article)
);

CREATE TABLE facture(
   Id_facture INT,
   num_facture INT,
   prixht_facture DECIMAL(15,2),
   date_facture DATE,
   adressdefact_facture VARCHAR(50),
   adressdelivr_facture VARCHAR(50),
   prixttc_facture DECIMAL(15,2),
   Id_com INT NOT NULL,
   PRIMARY KEY(Id_facture),
   UNIQUE(Id_com),
   FOREIGN KEY(Id_com) REFERENCES commande(Id_com)
);
