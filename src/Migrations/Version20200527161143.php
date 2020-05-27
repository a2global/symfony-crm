<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200527161143 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE writer DROP author_id');
        $this->addSql('ALTER TABLE address ADD author_id INT NOT NULL, ADD lived_till DATETIME NOT NULL');
        $this->addSql('ALTER TABLE address ADD CONSTRAINT FK_D4E6F81F675F31B FOREIGN KEY (author_id) REFERENCES writer (id)');
        $this->addSql('CREATE INDEX IDX_D4E6F81F675F31B ON address (author_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE address DROP FOREIGN KEY FK_D4E6F81F675F31B');
        $this->addSql('DROP INDEX IDX_D4E6F81F675F31B ON address');
        $this->addSql('ALTER TABLE address DROP author_id, DROP lived_till');
        $this->addSql('ALTER TABLE writer ADD author_id INT NOT NULL');
    }
}
