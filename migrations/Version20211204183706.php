<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211204183706 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comments (id INT AUTO_INCREMENT NOT NULL, products_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', users_id BINARY(16) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', content LONGTEXT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', rating INT DEFAULT NULL, INDEX IDX_5F9E962A6C8A81A9 (products_id), INDEX IDX_5F9E962A67B3B43D (users_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE genre (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', category_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, stock INT DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, description1 LONGTEXT DEFAULT NULL, description2 LONGTEXT DEFAULT NULL, description3 LONGTEXT NOT NULL, description4 LONGTEXT DEFAULT NULL, promo TINYINT(1) DEFAULT NULL, INDEX IDX_D34A04AD12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reset_password_request (id INT AUTO_INCREMENT NOT NULL, user_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', selector VARCHAR(20) NOT NULL, hashed_token VARCHAR(100) NOT NULL, requested_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', expires_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7CE748AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role_user (role_id INT NOT NULL, user_id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_332CA4DDD60322AC (role_id), INDEX IDX_332CA4DDA76ED395 (user_id), PRIMARY KEY(role_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id BINARY(16) NOT NULL COMMENT \'(DC2Type:uuid)\', genre_type_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, genre VARCHAR(255) DEFAULT NULL, is_verified TINYINT(1) NOT NULL, pseudo VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_8D93D649FEC91F6B (genre_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A6C8A81A9 FOREIGN KEY (products_id) REFERENCES product (id)');
        $this->addSql('ALTER TABLE comments ADD CONSTRAINT FK_5F9E962A67B3B43D FOREIGN KEY (users_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE reset_password_request ADD CONSTRAINT FK_7CE748AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE role_user ADD CONSTRAINT FK_332CA4DDD60322AC FOREIGN KEY (role_id) REFERENCES role (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE role_user ADD CONSTRAINT FK_332CA4DDA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649FEC91F6B FOREIGN KEY (genre_type_id) REFERENCES genre (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649FEC91F6B');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A6C8A81A9');
        $this->addSql('ALTER TABLE role_user DROP FOREIGN KEY FK_332CA4DDD60322AC');
        $this->addSql('ALTER TABLE comments DROP FOREIGN KEY FK_5F9E962A67B3B43D');
        $this->addSql('ALTER TABLE reset_password_request DROP FOREIGN KEY FK_7CE748AA76ED395');
        $this->addSql('ALTER TABLE role_user DROP FOREIGN KEY FK_332CA4DDA76ED395');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE comments');
        $this->addSql('DROP TABLE genre');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE reset_password_request');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE role_user');
        $this->addSql('DROP TABLE user');
    }
}
