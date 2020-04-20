<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200420173007 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE clients ADD string_username VARCHAR(255) DEFAULT NULL, ADD integer_age INT DEFAULT NULL, ADD float_weight DOUBLE PRECISION DEFAULT NULL, ADD choice_gender VARCHAR(255) DEFAULT NULL, ADD boolean_married TINYINT(1) DEFAULT NULL, ADD date_birthday DATE DEFAULT NULL, ADD datetime_registered_at DATETIME DEFAULT NULL, DROP gender, DROP birthday, DROP weight, DROP is_active');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE clients ADD gender VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD birthday DATE NOT NULL, ADD weight DOUBLE PRECISION NOT NULL, ADD is_active TINYINT(1) NOT NULL, DROP string_username, DROP integer_age, DROP float_weight, DROP choice_gender, DROP boolean_married, DROP date_birthday, DROP datetime_registered_at');
    }
}
