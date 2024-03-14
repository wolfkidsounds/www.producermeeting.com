<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240310215616 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location ADD address LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE meeting DROP begin, CHANGE scheduled_at scheduled_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE date date DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location DROP address');
        $this->addSql('ALTER TABLE meeting ADD begin TIME NOT NULL, CHANGE scheduled_at scheduled_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE date date DATE NOT NULL');
    }
}
