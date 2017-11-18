<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171118211931 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE usuario (id INT AUTO_INCREMENT NOT NULL, nombre_usuario VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, nombre VARCHAR(255) NOT NULL, apellidos VARCHAR(255) NOT NULL, correo_electronico VARCHAR(255) NOT NULL, administrador TINYINT(1) NOT NULL, seleccionador TINYINT(1) NOT NULL, moderador TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE idea ADD autor_id INT NOT NULL, DROP autor');
        $this->addSql('ALTER TABLE idea ADD CONSTRAINT FK_A8BCA4514D45BBE FOREIGN KEY (autor_id) REFERENCES usuario (id)');
        $this->addSql('CREATE INDEX IDX_A8BCA4514D45BBE ON idea (autor_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE idea DROP FOREIGN KEY FK_A8BCA4514D45BBE');
        $this->addSql('DROP TABLE usuario');
        $this->addSql('DROP INDEX IDX_A8BCA4514D45BBE ON idea');
        $this->addSql('ALTER TABLE idea ADD autor VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, DROP autor_id');
    }
}
