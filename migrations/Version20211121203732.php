<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211121203732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE trade_asset');
        $this->addSql('DROP TABLE trade_capability');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE trade_asset (trade_id INT NOT NULL, asset_id INT NOT NULL, INDEX IDX_28A28ABFC2D9760 (trade_id), INDEX IDX_28A28ABF5DA1941 (asset_id), PRIMARY KEY(trade_id, asset_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE trade_capability (trade_id INT NOT NULL, capability_id INT NOT NULL, INDEX IDX_B822B9DDC2D9760 (trade_id), INDEX IDX_B822B9DD92043242 (capability_id), PRIMARY KEY(trade_id, capability_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE trade_asset ADD CONSTRAINT FK_28A28ABFC2D9760 FOREIGN KEY (trade_id) REFERENCES trade (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trade_asset ADD CONSTRAINT FK_28A28ABF5DA1941 FOREIGN KEY (asset_id) REFERENCES asset (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trade_capability ADD CONSTRAINT FK_B822B9DDC2D9760 FOREIGN KEY (trade_id) REFERENCES trade (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trade_capability ADD CONSTRAINT FK_B822B9DD92043242 FOREIGN KEY (capability_id) REFERENCES capability (id) ON DELETE CASCADE');
    }
}
