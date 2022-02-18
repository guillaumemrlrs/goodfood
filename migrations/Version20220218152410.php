<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220218152410 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cb (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, numero VARCHAR(20) NOT NULL, titulaire VARCHAR(50) NOT NULL, date_validite VARCHAR(10) NOT NULL, INDEX IDX_ACB52AEFFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contenir_quantite (id INT AUTO_INCREMENT NOT NULL, commande_client_id INT DEFAULT NULL, menu_id INT DEFAULT NULL, plat_id INT DEFAULT NULL, panier_id INT DEFAULT NULL, quantite INT NOT NULL, INDEX IDX_4A1446B69E73363 (commande_client_id), INDEX IDX_4A1446B6CCD7E912 (menu_id), INDEX IDX_4A1446B6D73DB560 (plat_id), INDEX IDX_4A1446B6F77D927C (panier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, reduction_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_24CC0DF2FB88E14F (utilisateur_id), UNIQUE INDEX UNIQ_24CC0DF2C03CB092 (reduction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reduction (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(30) NOT NULL, pourcentage INT NOT NULL, date_expiration DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_paiement (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cb ADD CONSTRAINT FK_ACB52AEFFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE contenir_quantite ADD CONSTRAINT FK_4A1446B69E73363 FOREIGN KEY (commande_client_id) REFERENCES commande_client (id)');
        $this->addSql('ALTER TABLE contenir_quantite ADD CONSTRAINT FK_4A1446B6CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id)');
        $this->addSql('ALTER TABLE contenir_quantite ADD CONSTRAINT FK_4A1446B6D73DB560 FOREIGN KEY (plat_id) REFERENCES plat (id)');
        $this->addSql('ALTER TABLE contenir_quantite ADD CONSTRAINT FK_4A1446B6F77D927C FOREIGN KEY (panier_id) REFERENCES panier (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE panier ADD CONSTRAINT FK_24CC0DF2C03CB092 FOREIGN KEY (reduction_id) REFERENCES reduction (id)');
        $this->addSql('ALTER TABLE commande_client ADD type_paiement_id INT NOT NULL');
        $this->addSql('ALTER TABLE commande_client ADD CONSTRAINT FK_C510FF80615593E9 FOREIGN KEY (type_paiement_id) REFERENCES type_paiement (id)');
        $this->addSql('CREATE INDEX IDX_C510FF80615593E9 ON commande_client (type_paiement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contenir_quantite DROP FOREIGN KEY FK_4A1446B6F77D927C');
        $this->addSql('ALTER TABLE panier DROP FOREIGN KEY FK_24CC0DF2C03CB092');
        $this->addSql('ALTER TABLE commande_client DROP FOREIGN KEY FK_C510FF80615593E9');
        $this->addSql('DROP TABLE cb');
        $this->addSql('DROP TABLE contenir_quantite');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE reduction');
        $this->addSql('DROP TABLE type_paiement');
        $this->addSql('ALTER TABLE adresse CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ligne1 ligne1 VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ligne2 ligne2 VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE codepostal codepostal VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE categorie CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('DROP INDEX IDX_C510FF80615593E9 ON commande_client');
        $this->addSql('ALTER TABLE commande_client DROP type_paiement_id');
        $this->addSql('ALTER TABLE fournisseur CHANGE nom nom VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tel tel VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ligne1 ligne1 VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ligne2 ligne2 VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code_postal code_postal VARCHAR(15) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE groupement CHANGE nom nom VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE ingredient CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE menu CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE plat CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE plat_compose_ingredient CHANGE unite unite VARCHAR(25) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE restaurant CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tel tel VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ligne1 ligne1 VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ligne2 ligne2 VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code_postal code_postal VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE statut_commande CHANGE libelle libelle VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE utilisateur CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tel tel VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE civilite civilite VARCHAR(15) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
