<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230915063054 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE travailler ADD camp_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE travailler ADD CONSTRAINT FK_90B2DF3D717AF4CB FOREIGN KEY (camp_id_id) REFERENCES camp (id)');
        $this->addSql('CREATE INDEX IDX_90B2DF3D717AF4CB ON travailler (camp_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE travailler DROP FOREIGN KEY FK_90B2DF3D717AF4CB');
        $this->addSql('DROP INDEX IDX_90B2DF3D717AF4CB ON travailler');
        $this->addSql('ALTER TABLE travailler DROP camp_id_id');
    }
}
