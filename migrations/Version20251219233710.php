<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251219233710 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agent_comment (id INT AUTO_INCREMENT NOT NULL, content LONGTEXT NOT NULL, created_at DATETIME NOT NULL, problem_id INT NOT NULL, agent_id INT NOT NULL, INDEX IDX_462730C6A0DCED86 (problem_id), INDEX IDX_462730C63414710B (agent_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE agent_comment ADD CONSTRAINT FK_462730C6A0DCED86 FOREIGN KEY (problem_id) REFERENCES problem (id)');
        $this->addSql('ALTER TABLE agent_comment ADD CONSTRAINT FK_462730C63414710B FOREIGN KEY (agent_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent_comment DROP FOREIGN KEY FK_462730C6A0DCED86');
        $this->addSql('ALTER TABLE agent_comment DROP FOREIGN KEY FK_462730C63414710B');
        $this->addSql('DROP TABLE agent_comment');
    }
}
