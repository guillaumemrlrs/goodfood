<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220218091958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse ADD utilisateur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE adresse ADD CONSTRAINT FK_C35F0816FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('CREATE INDEX IDX_C35F0816FB88E14F ON adresse (utilisateur_id)');
        $this->addSql('ALTER TABLE utilisateur ADD nom VARCHAR(50) NOT NULL, ADD prenom VARCHAR(50) NOT NULL, ADD tel VARCHAR(20) NOT NULL, ADD civilite VARCHAR(15) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adresse DROP FOREIGN KEY FK_C35F0816FB88E14F');
        $this->addSql('DROP INDEX IDX_C35F0816FB88E14F ON adresse');
        $this->addSql('ALTER TABLE adresse DROP utilisateur_id, CHANGE nom nom VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ligne1 ligne1 VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ligne2 ligne2 VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE ville ville VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE codepostal codepostal VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE statut_commande CHANGE libelle libelle VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE utilisateur DROP nom, DROP prenom, DROP tel, DROP civilite, CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE roles roles LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci` COMMENT \'(DC2Type:json)\', CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
