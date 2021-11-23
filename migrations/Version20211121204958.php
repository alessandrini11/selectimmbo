<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211121204958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE trade_asset (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE asset ADD trade_asset_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE asset ADD CONSTRAINT FK_2AF5A5C51F7CE30 FOREIGN KEY (trade_asset_id) REFERENCES trade_asset (id)');
        $this->addSql('CREATE INDEX IDX_2AF5A5C51F7CE30 ON asset (trade_asset_id)');
        $this->addSql('ALTER TABLE trade ADD trade_asset_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE trade ADD CONSTRAINT FK_7E1A436651F7CE30 FOREIGN KEY (trade_asset_id) REFERENCES trade_asset (id)');
        $this->addSql('CREATE INDEX IDX_7E1A436651F7CE30 ON trade (trade_asset_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asset DROP FOREIGN KEY FK_2AF5A5C51F7CE30');
        $this->addSql('ALTER TABLE trade DROP FOREIGN KEY FK_7E1A436651F7CE30');
        $this->addSql('DROP TABLE trade_asset');
        $this->addSql('DROP INDEX IDX_2AF5A5C51F7CE30 ON asset');
        $this->addSql('ALTER TABLE asset DROP trade_asset_id');
        $this->addSql('DROP INDEX IDX_7E1A436651F7CE30 ON trade');
        $this->addSql('ALTER TABLE trade DROP trade_asset_id');
    }
}
