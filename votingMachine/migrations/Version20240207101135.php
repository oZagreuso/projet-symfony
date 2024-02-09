<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240207101135 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vote ADD session_id_id INT NOT NULL');
        $this->addSql('ALTER TABLE vote ADD CONSTRAINT FK_5A108564A4392681 FOREIGN KEY (session_id_id) REFERENCES session_vote (id)');
        $this->addSql('CREATE INDEX IDX_5A108564A4392681 ON vote (session_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE vote DROP FOREIGN KEY FK_5A108564A4392681');
        $this->addSql('DROP INDEX IDX_5A108564A4392681 ON vote');
        $this->addSql('ALTER TABLE vote DROP session_id_id');
    }
}
