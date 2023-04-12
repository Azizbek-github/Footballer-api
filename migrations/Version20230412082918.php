<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412082918 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE team (id INT AUTO_INCREMENT NOT NULL, capitan_id INT DEFAULT NULL, country_id INT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C4E0A61F5624577C (capitan_id), UNIQUE INDEX UNIQ_C4E0A61FF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE team_footballer (team_id INT NOT NULL, footballer_id INT NOT NULL, INDEX IDX_E44E637F296CD8AE (team_id), INDEX IDX_E44E637F933A9BDB (footballer_id), PRIMARY KEY(team_id, footballer_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61F5624577C FOREIGN KEY (capitan_id) REFERENCES footballer (id)');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61FF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE team_footballer ADD CONSTRAINT FK_E44E637F296CD8AE FOREIGN KEY (team_id) REFERENCES team (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE team_footballer ADD CONSTRAINT FK_E44E637F933A9BDB FOREIGN KEY (footballer_id) REFERENCES footballer (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61F5624577C');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61FF92F3E70');
        $this->addSql('ALTER TABLE team_footballer DROP FOREIGN KEY FK_E44E637F296CD8AE');
        $this->addSql('ALTER TABLE team_footballer DROP FOREIGN KEY FK_E44E637F933A9BDB');
        $this->addSql('DROP TABLE team');
        $this->addSql('DROP TABLE team_footballer');
    }
}
