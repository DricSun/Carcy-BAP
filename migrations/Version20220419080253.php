<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220419080253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE card (id INT AUTO_INCREMENT NOT NULL, image_user VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, e_mail VARCHAR(255) NOT NULL, title VARCHAR(255) DEFAULT NULL, society VARCHAR(255) DEFAULT NULL, site VARCHAR(255) DEFAULT NULL, tel_pro INT DEFAULT NULL, tel_perso INT DEFAULT NULL, fax INT DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, code_postal INT DEFAULT NULL, country VARCHAR(255) DEFAULT NULL, email_perso VARCHAR(255) DEFAULT NULL, note VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, theme VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact_user (contact_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_A56C54B6E7A1254A (contact_id), INDEX IDX_A56C54B6A76ED395 (user_id), PRIMARY KEY(contact_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE directory (id INT AUTO_INCREMENT NOT NULL, card_id INT DEFAULT NULL, updated_at DATETIME NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_467844DA4ACC9A20 (card_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contact_user ADD CONSTRAINT FK_A56C54B6E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contact_user ADD CONSTRAINT FK_A56C54B6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE directory ADD CONSTRAINT FK_467844DA4ACC9A20 FOREIGN KEY (card_id) REFERENCES card (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE directory DROP FOREIGN KEY FK_467844DA4ACC9A20');
        $this->addSql('ALTER TABLE contact_user DROP FOREIGN KEY FK_A56C54B6E7A1254A');
        $this->addSql('ALTER TABLE contact_user DROP FOREIGN KEY FK_A56C54B6A76ED395');
        $this->addSql('DROP TABLE card');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE contact_user');
        $this->addSql('DROP TABLE directory');
        $this->addSql('DROP TABLE user');
    }
}
