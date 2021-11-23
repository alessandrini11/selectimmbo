<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211119162205 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE trade (id INT AUTO_INCREMENT NOT NULL, location_id INT DEFAULT NULL, gallery_id INT DEFAULT NULL, id_trade INT NOT NULL, price VARCHAR(255) NOT NULL, currency VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, agreement VARCHAR(255) NOT NULL, completed VARCHAR(255) NOT NULL, ts_creation DATETIME NOT NULL, user_creation VARCHAR(255) NOT NULL, ts_update DATETIME DEFAULT NULL, user_update VARCHAR(255) DEFAULT NULL, INDEX IDX_7E1A436664D218E (location_id), INDEX IDX_7E1A43664E7AF8F (gallery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trade_capability (trade_id INT NOT NULL, capability_id INT NOT NULL, INDEX IDX_B822B9DDC2D9760 (trade_id), INDEX IDX_B822B9DD92043242 (capability_id), PRIMARY KEY(trade_id, capability_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trade_asset (trade_id INT NOT NULL, asset_id INT NOT NULL, INDEX IDX_28A28ABFC2D9760 (trade_id), INDEX IDX_28A28ABF5DA1941 (asset_id), PRIMARY KEY(trade_id, asset_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE trade ADD CONSTRAINT FK_7E1A436664D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE trade ADD CONSTRAINT FK_7E1A43664E7AF8F FOREIGN KEY (gallery_id) REFERENCES gallery (id)');
        $this->addSql('ALTER TABLE trade_capability ADD CONSTRAINT FK_B822B9DDC2D9760 FOREIGN KEY (trade_id) REFERENCES trade (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trade_capability ADD CONSTRAINT FK_B822B9DD92043242 FOREIGN KEY (capability_id) REFERENCES capability (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trade_asset ADD CONSTRAINT FK_28A28ABFC2D9760 FOREIGN KEY (trade_id) REFERENCES trade (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE trade_asset ADD CONSTRAINT FK_28A28ABF5DA1941 FOREIGN KEY (asset_id) REFERENCES asset (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE trade_capability DROP FOREIGN KEY FK_B822B9DDC2D9760');
        $this->addSql('ALTER TABLE trade_asset DROP FOREIGN KEY FK_28A28ABFC2D9760');
        $this->addSql('DROP TABLE trade');
        $this->addSql('DROP TABLE trade_capability');
        $this->addSql('DROP TABLE trade_asset');
    }
}
