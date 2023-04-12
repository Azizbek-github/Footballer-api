<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230410144218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE footballer (id INT AUTO_INCREMENT NOT NULL, country_id INT NOT NULL, user_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, number SMALLINT NOT NULL, UNIQUE INDEX UNIQ_DA9711BAF92F3E70 (country_id), UNIQUE INDEX UNIQ_DA9711BAA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE footballer ADD CONSTRAINT FK_DA9711BAF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE footballer ADD CONSTRAINT FK_DA9711BAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE footballer DROP FOREIGN KEY FK_DA9711BAF92F3E70');
        $this->addSql('ALTER TABLE footballer DROP FOREIGN KEY FK_DA9711BAA76ED395');
        $this->addSql('DROP TABLE footballer');
    }
}
