<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230915063608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE teams (id INT AUTO_INCREMENT NOT NULL, travailler_id_id INT DEFAULT NULL, member_count INT DEFAULT NULL, INDEX IDX_96C22258C55B0D1 (travailler_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE teams ADD CONSTRAINT FK_96C22258C55B0D1 FOREIGN KEY (travailler_id_id) REFERENCES travailler (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE teams DROP FOREIGN KEY FK_96C22258C55B0D1');
        $this->addSql('DROP TABLE teams');
    }
}
