<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221112201317 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lap (id INT AUTO_INCREMENT NOT NULL, session_id INT NOT NULL, lap_time DOUBLE PRECISION NOT NULL, INDEX IDX_926FC08C613FECDF (session_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE session (id INT AUTO_INCREMENT NOT NULL, track_id INT NOT NULL, date DATETIME NOT NULL, temperature DOUBLE PRECISION NOT NULL, pos_between_friends INT NOT NULL, pos_global INT NOT NULL, INDEX IDX_D044D5D45ED23C43 (track_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE track (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, length VARCHAR(255) NOT NULL, turns INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE lap ADD CONSTRAINT FK_926FC08C613FECDF FOREIGN KEY (session_id) REFERENCES session (id)');
        $this->addSql('ALTER TABLE session ADD CONSTRAINT FK_D044D5D45ED23C43 FOREIGN KEY (track_id) REFERENCES track (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE lap DROP FOREIGN KEY FK_926FC08C613FECDF');
        $this->addSql('ALTER TABLE session DROP FOREIGN KEY FK_D044D5D45ED23C43');
        $this->addSql('DROP TABLE lap');
        $this->addSql('DROP TABLE session');
        $this->addSql('DROP TABLE track');
    }
}
