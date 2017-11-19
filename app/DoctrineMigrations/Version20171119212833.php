<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171119212833 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE idea_categoria (idea_id INT NOT NULL, categoria_id INT NOT NULL, INDEX IDX_FCD730C05B6FEF7D (idea_id), INDEX IDX_FCD730C03397707A (categoria_id), PRIMARY KEY(idea_id, categoria_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categoria (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, descripcion VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE idea_categoria ADD CONSTRAINT FK_FCD730C05B6FEF7D FOREIGN KEY (idea_id) REFERENCES idea (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE idea_categoria ADD CONSTRAINT FK_FCD730C03397707A FOREIGN KEY (categoria_id) REFERENCES categoria (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE idea_categoria DROP FOREIGN KEY FK_FCD730C03397707A');
        $this->addSql('DROP TABLE idea_categoria');
        $this->addSql('DROP TABLE categoria');
    }
}
