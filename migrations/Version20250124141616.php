<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250124141616 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event_slot (id INT AUTO_INCREMENT NOT NULL, event_id INT DEFAULT NULL, place_id INT DEFAULT NULL, date_begin DATETIME NOT NULL, date_end DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_B3C56CCC71F7E88B (event_id), INDEX IDX_B3C56CCCDA6A219 (place_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event_slot ADD CONSTRAINT FK_B3C56CCC71F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE event_slot ADD CONSTRAINT FK_B3C56CCCDA6A219 FOREIGN KEY (place_id) REFERENCES place (id)');
        $this->addSql('ALTER TABLE event DROP event_date, CHANGE content content LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE place ADD address VARCHAR(255) NOT NULL, ADD zip_code VARCHAR(255) NOT NULL, ADD city VARCHAR(255) NOT NULL, ADD place VARCHAR(255) NOT NULL, DROP ville, DROP lieu');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event_slot DROP FOREIGN KEY FK_B3C56CCC71F7E88B');
        $this->addSql('ALTER TABLE event_slot DROP FOREIGN KEY FK_B3C56CCCDA6A219');
        $this->addSql('DROP TABLE event_slot');
        $this->addSql('ALTER TABLE event ADD event_date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE content content VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE place ADD ville VARCHAR(255) NOT NULL, ADD lieu VARCHAR(255) NOT NULL, DROP address, DROP zip_code, DROP city, DROP place');
    }
}
