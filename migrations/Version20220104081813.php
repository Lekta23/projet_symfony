<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220104081813 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE veille_info (id INT AUTO_INCREMENT NOT NULL, auteur_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, lien VARCHAR(255) NOT NULL, note VARCHAR(255) NOT NULL, INDEX IDX_79FB6A4A60BB6FE6 (auteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voter (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, veille_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_268C4A59A76ED395 (user_id), INDEX IDX_268C4A5955994766 (veille_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE veille_info ADD CONSTRAINT FK_79FB6A4A60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE voter ADD CONSTRAINT FK_268C4A59A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE voter ADD CONSTRAINT FK_268C4A5955994766 FOREIGN KEY (veille_id) REFERENCES veille_info (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE veille_info DROP FOREIGN KEY FK_79FB6A4A60BB6FE6');
        $this->addSql('ALTER TABLE voter DROP FOREIGN KEY FK_268C4A59A76ED395');
        $this->addSql('ALTER TABLE voter DROP FOREIGN KEY FK_268C4A5955994766');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE veille_info');
        $this->addSql('DROP TABLE voter');
    }
}
