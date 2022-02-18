<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220218090836 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adresse (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, ligne1 VARCHAR(100) NOT NULL, ligne2 VARCHAR(100) NOT NULL, ville VARCHAR(50) NOT NULL, codepostal VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande_client (id INT AUTO_INCREMENT NOT NULL, statut_commande_id INT DEFAULT NULL, adresse_id INT DEFAULT NULL, datecreation DATETIME NOT NULL, INDEX IDX_C510FF80FB435DFD (statut_commande_id), INDEX IDX_C510FF804DE7DC5C (adresse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut_commande (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1D1C63B3E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commande_client ADD CONSTRAINT FK_C510FF80FB435DFD FOREIGN KEY (statut_commande_id) REFERENCES statut_commande (id)');
        $this->addSql('ALTER TABLE commande_client ADD CONSTRAINT FK_C510FF804DE7DC5C FOREIGN KEY (adresse_id) REFERENCES adresse (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande_client DROP FOREIGN KEY FK_C510FF804DE7DC5C');
        $this->addSql('ALTER TABLE commande_client DROP FOREIGN KEY FK_C510FF80FB435DFD');
        $this->addSql('DROP TABLE adresse');
        $this->addSql('DROP TABLE commande_client');
        $this->addSql('DROP TABLE statut_commande');
        $this->addSql('DROP TABLE utilisateur');
    }
}
