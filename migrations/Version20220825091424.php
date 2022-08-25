<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220825091424 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE companies (id INT IDENTITY NOT NULL, name NVARCHAR(255), back_color_code NVARCHAR(10), text_color_code NVARCHAR(10), little_name NVARCHAR(255), director NVARCHAR(255), wording NVARCHAR(255), siret NVARCHAR(255), address NVARCHAR(255), address_supplement NVARCHAR(255), city NVARCHAR(255), zip_code NVARCHAR(10), is_archived BIT, is_visibled BIT, is_principal BIT, PRIMARY KEY (id))');
        $this->addSql('ALTER TABLE pda ADD company_id INT');
        $this->addSql('ALTER TABLE pda ADD CONSTRAINT FK_90944E2F979B1AD6 FOREIGN KEY (company_id) REFERENCES companies (id)');
        $this->addSql('CREATE INDEX IDX_90944E2F979B1AD6 ON pda (company_id)');
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
        $this->addSql('ALTER TABLE pda DROP CONSTRAINT FK_90944E2F979B1AD6');
        $this->addSql('DROP TABLE companies');
        $this->addSql('DROP INDEX IDX_90944E2F979B1AD6 ON pda');
        $this->addSql('ALTER TABLE pda DROP COLUMN company_id');
    }
}
