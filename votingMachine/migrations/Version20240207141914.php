<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240207141914 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE candidat (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, slogan VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_candidat (candidat_id INT NOT NULL, session_id INT NOT NULL, INDEX IDX_E119D4198D0EB82 (candidat_id), INDEX IDX_E119D419613FECDF (session_id), PRIMARY KEY(candidat_id, session_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session_vote (id INT AUTO_INCREMENT NOT NULL, nb_tours INT NOT NULL, nb_representants INT NOT NULL, statut VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vote (id INT AUTO_INCREMENT NOT NULL, session_id INT NOT NULL, candidat_id INT NOT NULL, tour INT NOT NULL, INDEX IDX_5A108564613FECDF (session_id), INDEX IDX_5A1085648D0EB82 (candidat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE session_candidat ADD CONSTRAINT FK_E119D4198D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE session_candidat ADD CONSTRAINT FK_E119D419613FECDF FOREIGN KEY (session_id) REFERENCES session_vote (id)');
        $this->addSql('ALTER TABLE vote ADD CONSTRAINT FK_5A108564613FECDF FOREIGN KEY (session_id) REFERENCES session_vote (id)');
        $this->addSql('ALTER TABLE vote ADD CONSTRAINT FK_5A1085648D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE session_candidat DROP FOREIGN KEY FK_E119D4198D0EB82');
        $this->addSql('ALTER TABLE session_candidat DROP FOREIGN KEY FK_E119D419613FECDF');
        $this->addSql('ALTER TABLE vote DROP FOREIGN KEY FK_5A108564613FECDF');
        $this->addSql('ALTER TABLE vote DROP FOREIGN KEY FK_5A1085648D0EB82');
        $this->addSql('DROP TABLE candidat');
        $this->addSql('DROP TABLE session_candidat');
        $this->addSql('DROP TABLE session_vote');
        $this->addSql('DROP TABLE vote');
    }
}
