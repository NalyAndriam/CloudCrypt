<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241217132941 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE failed_attempt (id INT GENERATED BY DEFAULT AS IDENTITY NOT NULL, attempts INT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, utilisateur_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A633CF0BFB88E14F ON failed_attempt (utilisateur_id)');
        $this->addSql('CREATE TABLE pin (id INT GENERATED BY DEFAULT AS IDENTITY NOT NULL, pin VARCHAR(10) NOT NULL, expires_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, utilisateur_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_B5852DF3FB88E14F ON pin (utilisateur_id)');
        $this->addSql('CREATE TABLE token (id INT GENERATED BY DEFAULT AS IDENTITY NOT NULL, token VARCHAR(250) NOT NULL, expires_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, utilisateur_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5F37A13BFB88E14F ON token (utilisateur_id)');
        $this->addSql('CREATE TABLE "user" (id INT GENERATED BY DEFAULT AS IDENTITY NOT NULL, username VARCHAR(50) NOT NULL, email VARCHAR(250) NOT NULL, password VARCHAR(250) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE failed_attempt ADD CONSTRAINT FK_A633CF0BFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE pin ADD CONSTRAINT FK_B5852DF3FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE token ADD CONSTRAINT FK_5F37A13BFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE failed_attempt DROP CONSTRAINT FK_A633CF0BFB88E14F');
        $this->addSql('ALTER TABLE pin DROP CONSTRAINT FK_B5852DF3FB88E14F');
        $this->addSql('ALTER TABLE token DROP CONSTRAINT FK_5F37A13BFB88E14F');
        $this->addSql('DROP TABLE failed_attempt');
        $this->addSql('DROP TABLE pin');
        $this->addSql('DROP TABLE token');
        $this->addSql('DROP TABLE "user"');
    }
}
