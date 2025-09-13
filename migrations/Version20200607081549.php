<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200607081549 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE software (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shortcut (id INT AUTO_INCREMENT NOT NULL, software_id INT NOT NULL, title VARCHAR(255) NOT NULL, windows VARCHAR(255) NOT NULL, macos VARCHAR(255) NOT NULL, linux VARCHAR(255) NOT NULL, context VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_2EF83F9CD7452741 (software_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shortcut_category (shortcut_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_32F7BCA279F0D498 (shortcut_id), INDEX IDX_32F7BCA212469DE2 (category_id), PRIMARY KEY(shortcut_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE shortcut ADD CONSTRAINT FK_2EF83F9CD7452741 FOREIGN KEY (software_id) REFERENCES software (id)');
        $this->addSql('ALTER TABLE shortcut_category ADD CONSTRAINT FK_32F7BCA279F0D498 FOREIGN KEY (shortcut_id) REFERENCES shortcut (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shortcut_category ADD CONSTRAINT FK_32F7BCA212469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE shortcut DROP FOREIGN KEY FK_2EF83F9CD7452741');
        $this->addSql('ALTER TABLE shortcut_category DROP FOREIGN KEY FK_32F7BCA279F0D498');
        $this->addSql('ALTER TABLE shortcut_category DROP FOREIGN KEY FK_32F7BCA212469DE2');
        $this->addSql('DROP TABLE software');
        $this->addSql('DROP TABLE shortcut');
        $this->addSql('DROP TABLE shortcut_category');
        $this->addSql('DROP TABLE category');
    }
}
