<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210315110541 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (art_id INT AUTO_INCREMENT NOT NULL, pro_id INT DEFAULT NULL, four_id INT DEFAULT NULL, cat_id INT DEFAULT NULL, art_photo VARCHAR(50) DEFAULT NULL, art_nom VARCHAR(30) DEFAULT NULL, art_libelle VARCHAR(30) DEFAULT NULL, art_prix_ht NUMERIC(15, 2) NOT NULL, art_min_stock SMALLINT NOT NULL, art_stock SMALLINT NOT NULL, art_promo TINYINT(1) NOT NULL, INDEX cat_id (cat_id), INDEX pro_id (pro_id), INDEX four_id (four_id), PRIMARY KEY(art_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (cat_id INT AUTO_INCREMENT NOT NULL, cat_id_1 INT DEFAULT NULL, cat_nom VARCHAR(30) DEFAULT NULL, INDEX cat_id_1 (cat_id_1), PRIMARY KEY(cat_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (com_id INT AUTO_INCREMENT NOT NULL, uti_id INT DEFAULT NULL, com_num VARCHAR(50) NOT NULL, com_date DATETIME NOT NULL, com_etat VARCHAR(30) NOT NULL, com_total_ht NUMERIC(15, 0) NOT NULL, com_type_de_paiement VARCHAR(50) DEFAULT NULL, com_reduc_commercial NUMERIC(2, 0) DEFAULT NULL, INDEX uti_id (uti_id), PRIMARY KEY(com_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employe (emp_id INT AUTO_INCREMENT NOT NULL, uti_id INT DEFAULT NULL, pos_id INT DEFAULT NULL, emp_date_entree DATETIME DEFAULT NULL, emp_date_sortie DATETIME DEFAULT NULL, emp_num_secu_social INT DEFAULT NULL, INDEX uti_id (uti_id), INDEX pos_id (pos_id), PRIMARY KEY(emp_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (fact_id INT AUTO_INCREMENT NOT NULL, com_id INT DEFAULT NULL, fact_num VARCHAR(255) NOT NULL, fact_prix_ht NUMERIC(15, 2) NOT NULL, fact_date DATE DEFAULT NULL, fact_prix_ttc NUMERIC(15, 2) DEFAULT NULL, UNIQUE INDEX com_id (com_id), PRIMARY KEY(fact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (four_id INT AUTO_INCREMENT NOT NULL, pay_id INT DEFAULT NULL, four_nom VARCHAR(30) DEFAULT NULL, four_adresse VARCHAR(50) DEFAULT NULL, four_ville VARCHAR(20) DEFAULT NULL, four_cp VARCHAR(5) DEFAULT NULL, four_tel VARCHAR(10) DEFAULT NULL, four_courriel VARCHAR(50) DEFAULT NULL, INDEX pay_id (pay_id), PRIMARY KEY(four_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lignedecommande (ligne_id INT AUTO_INCREMENT NOT NULL, com_id INT DEFAULT NULL, art_id INT DEFAULT NULL, ligne_prix NUMERIC(15, 2) DEFAULT NULL, ligne_quantite INT NOT NULL, INDEX com_id (com_id), INDEX art_id (art_id), PRIMARY KEY(ligne_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (pay_id INT AUTO_INCREMENT NOT NULL, pay_libelle VARCHAR(50) DEFAULT NULL, PRIMARY KEY(pay_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poste (pos_id INT AUTO_INCREMENT NOT NULL, pos_libelle VARCHAR(50) DEFAULT NULL, pos_description VARCHAR(50) DEFAULT NULL, PRIMARY KEY(pos_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (pro_id INT AUTO_INCREMENT NOT NULL, pro_coef NUMERIC(2, 2) NOT NULL, pro_date_debut DATETIME NOT NULL, pro_date_fin DATETIME NOT NULL, PRIMARY KEY(pro_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (uti_id INT AUTO_INCREMENT NOT NULL, uti_adresse VARCHAR(50) DEFAULT NULL, uti_adresse2 VARCHAR(50) DEFAULT NULL, uti_ville VARCHAR(50) DEFAULT NULL, uti_codepostal VARCHAR(10) DEFAULT NULL, uti_nom VARCHAR(50) NOT NULL, uti_role VARCHAR(20) DEFAULT NULL, uti_prenom VARCHAR(50) NOT NULL, uti_sexe VARCHAR(1) NOT NULL, uti_date_de_naissance DATE NOT NULL, uti_mail VARCHAR(255) NOT NULL, uti_tel VARCHAR(10) NOT NULL, uti_id_1 INT DEFAULT NULL, pay_id INT DEFAULT NULL, uti_identifiant VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B374C1F655 (uti_identifiant), INDEX pay_id (pay_id), INDEX uti_id_1 (uti_id_1), PRIMARY KEY(uti_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66C3B7E4BA FOREIGN KEY (pro_id) REFERENCES promotion (pro_id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66E5AC00A4 FOREIGN KEY (four_id) REFERENCES fournisseur (four_id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66E6ADA943 FOREIGN KEY (cat_id) REFERENCES categorie (cat_id)');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD634597AB279 FOREIGN KEY (cat_id_1) REFERENCES categorie (cat_id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D3951DF75 FOREIGN KEY (uti_id) REFERENCES utilisateur (uti_id)');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B93951DF75 FOREIGN KEY (uti_id) REFERENCES utilisateur (uti_id)');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B941085FAE FOREIGN KEY (pos_id) REFERENCES poste (pos_id)');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE866410748C0F37 FOREIGN KEY (com_id) REFERENCES commande (com_id)');
        $this->addSql('ALTER TABLE fournisseur ADD CONSTRAINT FK_369ECA32918501AB FOREIGN KEY (pay_id) REFERENCES pays (pay_id)');
        $this->addSql('ALTER TABLE lignedecommande ADD CONSTRAINT FK_A4C3DF16748C0F37 FOREIGN KEY (com_id) REFERENCES commande (com_id)');
        $this->addSql('ALTER TABLE lignedecommande ADD CONSTRAINT FK_A4C3DF168C25E51A FOREIGN KEY (art_id) REFERENCES article (art_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lignedecommande DROP FOREIGN KEY FK_A4C3DF168C25E51A');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66E6ADA943');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD634597AB279');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE866410748C0F37');
        $this->addSql('ALTER TABLE lignedecommande DROP FOREIGN KEY FK_A4C3DF16748C0F37');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66E5AC00A4');
        $this->addSql('ALTER TABLE fournisseur DROP FOREIGN KEY FK_369ECA32918501AB');
        $this->addSql('ALTER TABLE employe DROP FOREIGN KEY FK_F804D3B941085FAE');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66C3B7E4BA');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D3951DF75');
        $this->addSql('ALTER TABLE employe DROP FOREIGN KEY FK_F804D3B93951DF75');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE employe');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE lignedecommande');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE poste');
        $this->addSql('DROP TABLE promotion');
        $this->addSql('DROP TABLE utilisateur');
    }
}
