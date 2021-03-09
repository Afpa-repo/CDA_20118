<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210309150501 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article ADD pro_id_id INT DEFAULT NULL, ADD four_id_id INT NOT NULL, ADD cat_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66C19FAEF2 FOREIGN KEY (pro_id_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E666750DFAA FOREIGN KEY (four_id_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66C33F2EBA FOREIGN KEY (cat_id_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66C19FAEF2 ON article (pro_id_id)');
        $this->addSql('CREATE INDEX IDX_23A0E666750DFAA ON article (four_id_id)');
        $this->addSql('CREATE INDEX IDX_23A0E66C33F2EBA ON article (cat_id_id)');
        $this->addSql('ALTER TABLE categorie ADD cat_sup_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE categorie ADD CONSTRAINT FK_497DD6348C164F66 FOREIGN KEY (cat_sup_id_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_497DD6348C164F66 ON categorie (cat_sup_id_id)');
        $this->addSql('ALTER TABLE client ADD coo_id_id INT DEFAULT NULL, ADD emp_id_id INT NOT NULL, ADD pay_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455B36CF4BC FOREIGN KEY (coo_id_id) REFERENCES coordonnee (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C744045513C5666C FOREIGN KEY (emp_id_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C744045537A531CE FOREIGN KEY (pay_id_id) REFERENCES pays (id)');
        $this->addSql('CREATE INDEX IDX_C7440455B36CF4BC ON client (coo_id_id)');
        $this->addSql('CREATE INDEX IDX_C744045513C5666C ON client (emp_id_id)');
        $this->addSql('CREATE INDEX IDX_C744045537A531CE ON client (pay_id_id)');
        $this->addSql('ALTER TABLE commande ADD cli_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D5E33C665 FOREIGN KEY (cli_id_id) REFERENCES client (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67D5E33C665 ON commande (cli_id_id)');
        $this->addSql('ALTER TABLE employe ADD pos_id_id INT NOT NULL, ADD emp_pos_id_id INT DEFAULT NULL, ADD coo_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B9865F7CB2 FOREIGN KEY (pos_id_id) REFERENCES poste (id)');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B97C3EA503 FOREIGN KEY (emp_pos_id_id) REFERENCES employe (id)');
        $this->addSql('ALTER TABLE employe ADD CONSTRAINT FK_F804D3B9B36CF4BC FOREIGN KEY (coo_id_id) REFERENCES coordonnee (id)');
        $this->addSql('CREATE INDEX IDX_F804D3B9865F7CB2 ON employe (pos_id_id)');
        $this->addSql('CREATE INDEX IDX_F804D3B97C3EA503 ON employe (emp_pos_id_id)');
        $this->addSql('CREATE INDEX IDX_F804D3B9B36CF4BC ON employe (coo_id_id)');
        $this->addSql('ALTER TABLE facture ADD com_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE facture ADD CONSTRAINT FK_FE86641024F3E595 FOREIGN KEY (com_id_id) REFERENCES commande (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_FE86641024F3E595 ON facture (com_id_id)');
        $this->addSql('ALTER TABLE fournisseur ADD pay_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE fournisseur ADD CONSTRAINT FK_369ECA3237A531CE FOREIGN KEY (pay_id_id) REFERENCES pays (id)');
        $this->addSql('CREATE INDEX IDX_369ECA3237A531CE ON fournisseur (pay_id_id)');
        $this->addSql('ALTER TABLE ligne_de_commande ADD com_id_id INT NOT NULL, ADD art_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE ligne_de_commande ADD CONSTRAINT FK_7982ACE624F3E595 FOREIGN KEY (com_id_id) REFERENCES commande (id)');
        $this->addSql('ALTER TABLE ligne_de_commande ADD CONSTRAINT FK_7982ACE61FFD30F4 FOREIGN KEY (art_id_id) REFERENCES article (id)');
        $this->addSql('CREATE INDEX IDX_7982ACE624F3E595 ON ligne_de_commande (com_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_7982ACE61FFD30F4 ON ligne_de_commande (art_id_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66C19FAEF2');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E666750DFAA');
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66C33F2EBA');
        $this->addSql('DROP INDEX IDX_23A0E66C19FAEF2 ON article');
        $this->addSql('DROP INDEX IDX_23A0E666750DFAA ON article');
        $this->addSql('DROP INDEX IDX_23A0E66C33F2EBA ON article');
        $this->addSql('ALTER TABLE article DROP pro_id_id, DROP four_id_id, DROP cat_id_id');
        $this->addSql('ALTER TABLE categorie DROP FOREIGN KEY FK_497DD6348C164F66');
        $this->addSql('DROP INDEX IDX_497DD6348C164F66 ON categorie');
        $this->addSql('ALTER TABLE categorie DROP cat_sup_id_id');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455B36CF4BC');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C744045513C5666C');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C744045537A531CE');
        $this->addSql('DROP INDEX IDX_C7440455B36CF4BC ON client');
        $this->addSql('DROP INDEX IDX_C744045513C5666C ON client');
        $this->addSql('DROP INDEX IDX_C744045537A531CE ON client');
        $this->addSql('ALTER TABLE client DROP coo_id_id, DROP emp_id_id, DROP pay_id_id');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D5E33C665');
        $this->addSql('DROP INDEX IDX_6EEAA67D5E33C665 ON commande');
        $this->addSql('ALTER TABLE commande DROP cli_id_id');
        $this->addSql('ALTER TABLE employe DROP FOREIGN KEY FK_F804D3B9865F7CB2');
        $this->addSql('ALTER TABLE employe DROP FOREIGN KEY FK_F804D3B97C3EA503');
        $this->addSql('ALTER TABLE employe DROP FOREIGN KEY FK_F804D3B9B36CF4BC');
        $this->addSql('DROP INDEX IDX_F804D3B9865F7CB2 ON employe');
        $this->addSql('DROP INDEX IDX_F804D3B97C3EA503 ON employe');
        $this->addSql('DROP INDEX IDX_F804D3B9B36CF4BC ON employe');
        $this->addSql('ALTER TABLE employe DROP pos_id_id, DROP emp_pos_id_id, DROP coo_id_id');
        $this->addSql('ALTER TABLE facture DROP FOREIGN KEY FK_FE86641024F3E595');
        $this->addSql('DROP INDEX UNIQ_FE86641024F3E595 ON facture');
        $this->addSql('ALTER TABLE facture DROP com_id_id');
        $this->addSql('ALTER TABLE fournisseur DROP FOREIGN KEY FK_369ECA3237A531CE');
        $this->addSql('DROP INDEX IDX_369ECA3237A531CE ON fournisseur');
        $this->addSql('ALTER TABLE fournisseur DROP pay_id_id');
        $this->addSql('ALTER TABLE ligne_de_commande DROP FOREIGN KEY FK_7982ACE624F3E595');
        $this->addSql('ALTER TABLE ligne_de_commande DROP FOREIGN KEY FK_7982ACE61FFD30F4');
        $this->addSql('DROP INDEX IDX_7982ACE624F3E595 ON ligne_de_commande');
        $this->addSql('DROP INDEX UNIQ_7982ACE61FFD30F4 ON ligne_de_commande');
        $this->addSql('ALTER TABLE ligne_de_commande DROP com_id_id, DROP art_id_id');
    }
}
