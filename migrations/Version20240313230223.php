<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313230223 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE host CHANGE image image TEXT DEFAULT NULL COMMENT \'(DC2Type:easy_media_type)\'');
        $this->addSql('ALTER TABLE location CHANGE image image TEXT DEFAULT NULL COMMENT \'(DC2Type:easy_media_type)\'');
        $this->addSql('ALTER TABLE meeting CHANGE image image TEXT DEFAULT NULL COMMENT \'(DC2Type:easy_media_type)\'');
        $this->addSql('ALTER TABLE speaker CHANGE image image TEXT DEFAULT NULL COMMENT \'(DC2Type:easy_media_type)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE host CHANGE image image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE location CHANGE image image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE meeting CHANGE image image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE speaker CHANGE image image VARCHAR(255) NOT NULL');
    }
}
