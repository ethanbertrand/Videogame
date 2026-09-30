<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260916082051 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE jv_utilisateur (jv_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_AD34980EC2F47B93 (jv_id), INDEX IDX_AD34980EFB88E14F (utilisateur_id), PRIMARY KEY (jv_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE jv_utilisateur ADD CONSTRAINT FK_AD34980EC2F47B93 FOREIGN KEY (jv_id) REFERENCES jv (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jv_utilisateur ADD CONSTRAINT FK_AD34980EFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jv_utilisateur DROP FOREIGN KEY FK_AD34980EC2F47B93');
        $this->addSql('ALTER TABLE jv_utilisateur DROP FOREIGN KEY FK_AD34980EFB88E14F');
        $this->addSql('DROP TABLE jv_utilisateur');
    }
}
