<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211213130822 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE voter (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, veille_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_268C4A59A76ED395 (user_id), INDEX IDX_268C4A5955994766 (veille_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE voter ADD CONSTRAINT FK_268C4A59A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE voter ADD CONSTRAINT FK_268C4A5955994766 FOREIGN KEY (veille_id) REFERENCES veille_info (id)');
        $this->addSql('ALTER TABLE veille_info ADD auteur_id INT DEFAULT NULL, DROP auteur');
        $this->addSql('ALTER TABLE veille_info ADD CONSTRAINT FK_79FB6A4A60BB6FE6 FOREIGN KEY (auteur_id) REFERENCES `user` (id)');
        $this->addSql('CREATE INDEX IDX_79FB6A4A60BB6FE6 ON veille_info (auteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE voter');
        $this->addSql('ALTER TABLE veille_info DROP FOREIGN KEY FK_79FB6A4A60BB6FE6');
        $this->addSql('DROP INDEX IDX_79FB6A4A60BB6FE6 ON veille_info');
        $this->addSql('ALTER TABLE veille_info ADD auteur VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP auteur_id');
    }
}
