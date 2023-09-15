<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230915070159 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE association (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, location VARCHAR(255) DEFAULT NULL, scope VARCHAR(255) DEFAULT NULL, field_of_activity VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE donation (id INT AUTO_INCREMENT NOT NULL, ressources_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, amount INT DEFAULT NULL, INDEX IDX_31E581A03C361826 (ressources_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ressource (id INT AUTO_INCREMENT NOT NULL, services_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, quantity INT DEFAULT NULL, localisation VARCHAR(255) DEFAULT NULL, INDEX IDX_939F4544AEF5A6C1 (services_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teams (id INT AUTO_INCREMENT NOT NULL, travailler_id_id INT DEFAULT NULL, service_type_id INT DEFAULT NULL, member_count INT DEFAULT NULL, INDEX IDX_96C22258C55B0D1 (travailler_id_id), INDEX IDX_96C22258AC8DE0F (service_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE volunteer (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, nationality VARCHAR(255) NOT NULL, age INT DEFAULT NULL, occupation VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE donation ADD CONSTRAINT FK_31E581A03C361826 FOREIGN KEY (ressources_id) REFERENCES ressource (id)');
        $this->addSql('ALTER TABLE ressource ADD CONSTRAINT FK_939F4544AEF5A6C1 FOREIGN KEY (services_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE teams ADD CONSTRAINT FK_96C22258C55B0D1 FOREIGN KEY (travailler_id_id) REFERENCES travailler (id)');
        $this->addSql('ALTER TABLE teams ADD CONSTRAINT FK_96C22258AC8DE0F FOREIGN KEY (service_type_id) REFERENCES service (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donation DROP FOREIGN KEY FK_31E581A03C361826');
        $this->addSql('ALTER TABLE ressource DROP FOREIGN KEY FK_939F4544AEF5A6C1');
        $this->addSql('ALTER TABLE teams DROP FOREIGN KEY FK_96C22258C55B0D1');
        $this->addSql('ALTER TABLE teams DROP FOREIGN KEY FK_96C22258AC8DE0F');
        $this->addSql('DROP TABLE association');
        $this->addSql('DROP TABLE donation');
        $this->addSql('DROP TABLE ressource');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE teams');
        $this->addSql('DROP TABLE volunteer');
    }
}
