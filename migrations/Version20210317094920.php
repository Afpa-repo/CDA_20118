<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210317094920 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD art_desc LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employe (emp_id INT AUTO_INCREMENT NOT NULL, uti_id INT DEFAULT NULL, pos_id INT DEFAULT NULL, emp_date_entree DATETIME DEFAULT NULL, emp_date_sortie DATETIME DEFAULT NULL, emp_num_secu_social INT DEFAULT NULL, INDEX uti_id (uti_id), INDEX pos_id (pos_id), PRIMARY KEY(emp_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B93951DF75 FOREIGN KEY (uti_id) REFERENCES utilisateur (uti_id)');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B941085FAE FOREIGN KEY (pos_id) REFERENCES poste (pos_id)');
        $this->addSql('ALTER TABLE fournisseur ADD four_email VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE four_nom four_nom VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE four_cp four_cp VARCHAR(10) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE four_tel four_tel VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE promotion CHANGE pro_coef pro_coef INT DEFAULT 0 NOT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\'');
    }
}
