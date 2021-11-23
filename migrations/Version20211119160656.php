<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211119160656 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location ADD metropolis_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE location ADD CONSTRAINT FK_5E9E89CB13F7B9CA FOREIGN KEY (metropolis_id) REFERENCES metropolis (id)');
        $this->addSql('CREATE INDEX IDX_5E9E89CB13F7B9CA ON location (metropolis_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE location DROP FOREIGN KEY FK_5E9E89CB13F7B9CA');
        $this->addSql('DROP INDEX IDX_5E9E89CB13F7B9CA ON location');
        $this->addSql('ALTER TABLE location DROP metropolis_id');
    }
}
