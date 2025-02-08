<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250208085751 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event_slot DROP FOREIGN KEY FK_B3C56CCCDA6A219');
        $this->addSql('DROP INDEX IDX_B3C56CCCDA6A219 ON event_slot');
        $this->addSql('ALTER TABLE event_slot DROP place_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event_slot ADD place_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event_slot ADD CONSTRAINT FK_B3C56CCCDA6A219 FOREIGN KEY (place_id) REFERENCES place (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_B3C56CCCDA6A219 ON event_slot (place_id)');
    }
}
