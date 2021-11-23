<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211121205555 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE trade_capabilities (id INT AUTO_INCREMENT NOT NULL, trade_id INT DEFAULT NULL, capability_id INT DEFAULT NULL, INDEX IDX_A5206B3C2D9760 (trade_id), INDEX IDX_A5206B392043242 (capability_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE trade_capabilities ADD CONSTRAINT FK_A5206B3C2D9760 FOREIGN KEY (trade_id) REFERENCES trade (id)');
        $this->addSql('ALTER TABLE trade_capabilities ADD CONSTRAINT FK_A5206B392043242 FOREIGN KEY (capability_id) REFERENCES capability (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE trade_capabilities');
    }
}
