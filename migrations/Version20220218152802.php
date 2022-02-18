<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220218152802 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande_client CHANGE type_paiement_id type_paiement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande_client ADD CONSTRAINT FK_C510FF80615593E9 FOREIGN KEY (type_paiement_id) REFERENCES type_paiement (id)');
        $this->addSql('CREATE INDEX IDX_C510FF80615593E9 ON commande_client (type_paiement_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ligne1 ligne1 VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ligne2 ligne2 VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE codepostal codepostal VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE categorie CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE cb CHANGE numero numero VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE titulaire titulaire VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE date_validite date_validite VARCHAR(10) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE commande_client DROP FOREIGN KEY FK_C510FF80615593E9');
        $this->addSql('DROP INDEX IDX_C510FF80615593E9 ON commande_client');
        $this->addSql('ALTER TABLE commande_client CHANGE type_paiement_id type_paiement_id INT NOT NULL');
        $this->addSql('ALTER TABLE fournisseur CHANGE nom nom VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tel tel VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ligne1 ligne1 VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ligne2 ligne2 VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code_postal code_postal VARCHAR(15) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE groupement CHANGE nom nom VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE ingredient CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE menu CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE plat CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE description description VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE plat_compose_ingredient CHANGE unite unite VARCHAR(25) DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE reduction CHANGE code code VARCHAR(30) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE restaurant CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tel tel VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE email email VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ligne1 ligne1 VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ligne2 ligne2 VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(70) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE code_postal code_postal VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE statut_commande CHANGE libelle libelle VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type_paiement CHANGE libelle libelle VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE utilisateur CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE prenom prenom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE tel tel VARCHAR(20) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE civilite civilite VARCHAR(15) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
