<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250127155202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event_registration DROP FOREIGN KEY FK_8FBBAD5471F7E88B');
        $this->addSql('DROP INDEX IDX_8FBBAD5471F7E88B ON event_registration');
        $this->addSql('ALTER TABLE event_registration ADD event_slot_id INT DEFAULT NULL, DROP event_id');
        $this->addSql('ALTER TABLE event_registration ADD CONSTRAINT FK_8FBBAD54DCB2B833 FOREIGN KEY (event_slot_id) REFERENCES event_slot (id)');
        $this->addSql('CREATE INDEX IDX_8FBBAD54DCB2B833 ON event_registration (event_slot_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event_registration DROP FOREIGN KEY FK_8FBBAD54DCB2B833');
        $this->addSql('DROP INDEX IDX_8FBBAD54DCB2B833 ON event_registration');
        $this->addSql('ALTER TABLE event_registration ADD event_id INT NOT NULL, DROP event_slot_id');
        $this->addSql('ALTER TABLE event_registration ADD CONSTRAINT FK_8FBBAD5471F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8FBBAD5471F7E88B ON event_registration (event_id)');
    }
}
