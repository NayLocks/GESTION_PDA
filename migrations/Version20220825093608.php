<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220825093608 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sim (id INT IDENTITY NOT NULL, no_sim NVARCHAR(255), no_phone NVARCHAR(255), PRIMARY KEY (id))');
        $this->addSql('CREATE TABLE type (id INT IDENTITY NOT NULL, name NVARCHAR(255), PRIMARY KEY (id))');
        $this->addSql('ALTER TABLE pda ADD type_id INT');
        $this->addSql('ALTER TABLE pda ADD sim_id INT');
        $this->addSql('ALTER TABLE pda ADD CONSTRAINT FK_90944E2FC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE pda ADD CONSTRAINT FK_90944E2FF81AF80C FOREIGN KEY (sim_id) REFERENCES sim (id)');
        $this->addSql('CREATE INDEX IDX_90944E2FC54C8C93 ON pda (type_id)');
        $this->addSql('CREATE INDEX IDX_90944E2FF81AF80C ON pda (sim_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA db_accessadmin');
        $this->addSql('CREATE SCHEMA db_backupoperator');
        $this->addSql('CREATE SCHEMA db_datareader');
        $this->addSql('CREATE SCHEMA db_datawriter');
        $this->addSql('CREATE SCHEMA db_ddladmin');
        $this->addSql('CREATE SCHEMA db_denydatareader');
        $this->addSql('CREATE SCHEMA db_denydatawriter');
        $this->addSql('CREATE SCHEMA db_owner');
        $this->addSql('CREATE SCHEMA db_securityadmin');
        $this->addSql('CREATE SCHEMA dbo');
        $this->addSql('ALTER TABLE pda DROP CONSTRAINT FK_90944E2FF81AF80C');
        $this->addSql('ALTER TABLE pda DROP CONSTRAINT FK_90944E2FC54C8C93');
        $this->addSql('DROP TABLE sim');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP INDEX IDX_90944E2FC54C8C93 ON pda');
        $this->addSql('DROP INDEX IDX_90944E2FF81AF80C ON pda');
        $this->addSql('ALTER TABLE pda DROP COLUMN type_id');
        $this->addSql('ALTER TABLE pda DROP COLUMN sim_id');
    }
}
