<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230915064725 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teams (id INT AUTO_INCREMENT NOT NULL, travailler_id_id INT DEFAULT NULL, service_type_id INT DEFAULT NULL, member_count INT DEFAULT NULL, INDEX IDX_96C22258C55B0D1 (travailler_id_id), INDEX IDX_96C22258AC8DE0F (service_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE teams ADD CONSTRAINT FK_96C22258C55B0D1 FOREIGN KEY (travailler_id_id) REFERENCES travailler (id)');
        $this->addSql('ALTER TABLE teams ADD CONSTRAINT FK_96C22258AC8DE0F FOREIGN KEY (service_type_id) REFERENCES service (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE teams DROP FOREIGN KEY FK_96C22258C55B0D1');
        $this->addSql('ALTER TABLE teams DROP FOREIGN KEY FK_96C22258AC8DE0F');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE teams');
    }
}
