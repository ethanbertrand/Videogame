<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20261005122917 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, slug VARCHAR(255) DEFAULT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE jv (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, date_sortie DATETIME NOT NULL, description VARCHAR(255) NOT NULL, detail VARCHAR(255) NOT NULL, id_genre_id INT NOT NULL, INDEX IDX_67AD45DB124D3F8A (id_genre_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE jv_plateforme (jv_id INT NOT NULL, plateforme_id INT NOT NULL, INDEX IDX_C461936BC2F47B93 (jv_id), INDEX IDX_C461936B391E226B (plateforme_id), PRIMARY KEY (jv_id, plateforme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE jv_utilisateur (jv_id INT NOT NULL, utilisateur_id INT NOT NULL, INDEX IDX_AD34980EC2F47B93 (jv_id), INDEX IDX_AD34980EFB88E14F (utilisateur_id), PRIMARY KEY (jv_id, utilisateur_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE plateforme (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, mail VARCHAR(255) NOT NULL, mdp VARCHAR(255) NOT NULL, pseudo VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0E3BD61CE16BA31DBBF396750 (queue_name, available_at, delivered_at, id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE jv ADD CONSTRAINT FK_67AD45DB124D3F8A FOREIGN KEY (id_genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE jv_plateforme ADD CONSTRAINT FK_C461936BC2F47B93 FOREIGN KEY (jv_id) REFERENCES jv (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jv_plateforme ADD CONSTRAINT FK_C461936B391E226B FOREIGN KEY (plateforme_id) REFERENCES plateforme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jv_utilisateur ADD CONSTRAINT FK_AD34980EC2F47B93 FOREIGN KEY (jv_id) REFERENCES jv (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE jv_utilisateur ADD CONSTRAINT FK_AD34980EFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE jv DROP FOREIGN KEY FK_67AD45DB124D3F8A');
        $this->addSql('ALTER TABLE jv_plateforme DROP FOREIGN KEY FK_C461936BC2F47B93');
        $this->addSql('ALTER TABLE jv_plateforme DROP FOREIGN KEY FK_C461936B391E226B');
        $this->addSql('ALTER TABLE jv_utilisateur DROP FOREIGN KEY FK_AD34980EC2F47B93');
        $this->addSql('ALTER TABLE jv_utilisateur DROP FOREIGN KEY FK_AD34980EFB88E14F');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE jv');
        $this->addSql('DROP TABLE jv_plateforme');
        $this->addSql('DROP TABLE jv_utilisateur');
        $this->addSql('DROP TABLE plateforme');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
