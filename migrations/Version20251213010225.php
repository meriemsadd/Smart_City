<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251213010225 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, description LONGTEXT NOT NULL, icon VARCHAR(50) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE problem (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(200) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, statut VARCHAR(20) NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, priority_score INT NOT NULL, created_at DATETIME NOT NULL, citizen_id INT DEFAULT NULL, agent_id INT DEFAULT NULL, category_id INT DEFAULT NULL, INDEX IDX_D7E7CCC8A63C3C2E (citizen_id), INDEX IDX_D7E7CCC83414710B (agent_id), INDEX IDX_D7E7CCC812469DE2 (category_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE problem ADD CONSTRAINT FK_D7E7CCC8A63C3C2E FOREIGN KEY (citizen_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE problem ADD CONSTRAINT FK_D7E7CCC83414710B FOREIGN KEY (agent_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE problem ADD CONSTRAINT FK_D7E7CCC812469DE2 FOREIGN KEY (category_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE problem DROP FOREIGN KEY FK_D7E7CCC8A63C3C2E');
        $this->addSql('ALTER TABLE problem DROP FOREIGN KEY FK_D7E7CCC83414710B');
        $this->addSql('ALTER TABLE problem DROP FOREIGN KEY FK_D7E7CCC812469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE problem');
    }
}
