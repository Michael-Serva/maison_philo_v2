<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211204122950 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A9F1D6087');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A6C8A81A9');
        $this->addSql('DROP INDEX IDX_5F9E962A9F1D6087 ON comments');
        $this->addSql('DROP INDEX IDX_5F9E962A6C8A81A9 ON comments');
        $this->addSql('ALTER TABLE comments CHANGE products_id_id products_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A6C8A81A9 FOREIGN KEY (products_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_5F9E962A6C8A81A9 ON comments (products_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A6C8A81A9');
        $this->addSql('DROP INDEX IDX_5F9E962A6C8A81A9 ON comments');
        $this->addSql('ALTER TABLE comments CHANGE products_id products_id_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A9F1D6087 FOREIGN KEY (products_id_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A6C8A81A9 FOREIGN KEY (products_id_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_5F9E962A9F1D6087 ON comments (products_id_id)');
        $this->addSql('CREATE INDEX IDX_5F9E962A6C8A81A9 ON comments (products_id_id)');
    }
}
