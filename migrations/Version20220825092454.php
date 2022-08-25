<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220825092454 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE pda ADD company_temp_id INT');
        $this->addSql('ALTER TABLE pda ADD no_pda NVARCHAR(255)');
        $this->addSql('ALTER TABLE pda ADD no_site_pda NVARCHAR(255)');
        $this->addSql('ALTER TABLE pda ADD first_name NVARCHAR(255)');
        $this->addSql('ALTER TABLE pda ADD last_name NVARCHAR(255)');
        $this->addSql('ALTER TABLE pda ADD problem NVARCHAR(255)');
        $this->addSql('ALTER TABLE pda ADD CONSTRAINT FK_90944E2F6EBDA03A FOREIGN KEY (company_temp_id) REFERENCES companies (id)');
        $this->addSql('CREATE INDEX IDX_90944E2F6EBDA03A ON pda (company_temp_id)');
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
        $this->addSql('ALTER TABLE pda DROP CONSTRAINT FK_90944E2F6EBDA03A');
        $this->addSql('DROP INDEX IDX_90944E2F6EBDA03A ON pda');
        $this->addSql('ALTER TABLE pda DROP COLUMN company_temp_id');
        $this->addSql('ALTER TABLE pda DROP COLUMN no_pda');
        $this->addSql('ALTER TABLE pda DROP COLUMN no_site_pda');
        $this->addSql('ALTER TABLE pda DROP COLUMN first_name');
        $this->addSql('ALTER TABLE pda DROP COLUMN last_name');
        $this->addSql('ALTER TABLE pda DROP COLUMN problem');
    }
}
