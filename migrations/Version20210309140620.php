<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210309140620 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, art_photo VARCHAR(255) NOT NULL, art_nom VARCHAR(50) NOT NULL, art_libelle VARCHAR(255) DEFAULT NULL, art_prix_ht NUMERIC(10, 2) NOT NULL, art_min_stock INT NOT NULL, art_stock INT NOT NULL, art_promo TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, cat_nom VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, cli_nom VARCHAR(50) NOT NULL, cli_prenom VARCHAR(50) NOT NULL, cli_identifiant VARCHAR(255) NOT NULL, cli_mdp VARCHAR(255) NOT NULL, cli_sexe TINYINT(1) NOT NULL, cli_date_naissance DATE NOT NULL, cli_coef NUMERIC(2, 2) DEFAULT NULL, cli_client_pro TINYINT(1) NOT NULL, cli_email VARCHAR(255) NOT NULL, cli_tel VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, com_num VARCHAR(255) NOT NULL, com_date DATETIME NOT NULL, com_etat VARCHAR(50) NOT NULL, com_total_ht NUMERIC(10, 2) NOT NULL, com_type_paiement VARCHAR(50) NOT NULL, com_reduc_commerciale NUMERIC(2, 2) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coordonnee (id INT AUTO_INCREMENT NOT NULL, coo_adresse VARCHAR(255) NOT NULL, coo_adresse_suite VARCHAR(255) DEFAULT NULL, coo_ville VARCHAR(50) NOT NULL, coo_cp VARCHAR(20) NOT NULL, coo_type VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employe (id INT AUTO_INCREMENT NOT NULL, emp_date_entree DATETIME NOT NULL, emp_date_sortie DATETIME DEFAULT NULL, emp_num_secu_social INT NOT NULL, emp_email VARCHAR(255) NOT NULL, emp_tel VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, fact_num VARCHAR(255) NOT NULL, fact_prix_ht NUMERIC(10, 2) NOT NULL, fact_date DATETIME NOT NULL, fact_prix_ttc NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, four_nom VARCHAR(50) NOT NULL, four_adresse VARCHAR(255) NOT NULL, four_ville VARCHAR(50) NOT NULL, four_cp VARCHAR(20) NOT NULL, four_tel VARCHAR(20) NOT NULL, four_email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ligne_de_commande (id INT AUTO_INCREMENT NOT NULL, ligne_prix NUMERIC(10, 2) NOT NULL, ligne_quantite INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pays (id INT AUTO_INCREMENT NOT NULL, pay_libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE poste (id INT AUTO_INCREMENT NOT NULL, pos_libelle VARCHAR(50) NOT NULL, pos_description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE promotion (id INT AUTO_INCREMENT NOT NULL, pro_coef NUMERIC(2, 2) NOT NULL, pro_date_debut DATETIME NOT NULL, pro_date_fin DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE coordonnee');
        $this->addSql('DROP TABLE employe');
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE ligne_de_commande');
        $this->addSql('DROP TABLE pays');
        $this->addSql('DROP TABLE poste');
        $this->addSql('DROP TABLE promotion');
    }
}
