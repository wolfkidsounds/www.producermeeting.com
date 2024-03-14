<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313232645 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meeting ADD speaker_id INT NOT NULL');
        $this->addSql('ALTER TABLE meeting ADD CONSTRAINT FK_F515E139D04A0F27 FOREIGN KEY (speaker_id) REFERENCES speaker (id)');
        $this->addSql('CREATE INDEX IDX_F515E139D04A0F27 ON meeting (speaker_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meeting DROP FOREIGN KEY FK_F515E139D04A0F27');
        $this->addSql('DROP INDEX IDX_F515E139D04A0F27 ON meeting');
        $this->addSql('ALTER TABLE meeting DROP speaker_id');
    }
}
