<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240207102923 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidat_session_vote (candidat_id INT NOT NULL, session_vote_id INT NOT NULL, INDEX IDX_3EA966058D0EB82 (candidat_id), INDEX IDX_3EA96605600458A6 (session_vote_id), PRIMARY KEY(candidat_id, session_vote_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_candidat (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE candidat_session_vote ADD CONSTRAINT FK_3EA966058D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE candidat_session_vote ADD CONSTRAINT FK_3EA96605600458A6 FOREIGN KEY (session_vote_id) REFERENCES session_vote (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat_session_vote DROP FOREIGN KEY FK_3EA966058D0EB82');
        $this->addSql('ALTER TABLE candidat_session_vote DROP FOREIGN KEY FK_3EA96605600458A6');
        $this->addSql('DROP TABLE candidat_session_vote');
        $this->addSql('DROP TABLE session_candidat');
    }
}
