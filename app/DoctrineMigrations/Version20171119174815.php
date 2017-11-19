<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171119174815 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE voto (idea_id INT NOT NULL, usuario_id INT NOT NULL, puntos INT NOT NULL, fecha DATE NOT NULL, INDEX IDX_BAC56C7A5B6FEF7D (idea_id), INDEX IDX_BAC56C7ADB38439E (usuario_id), PRIMARY KEY(idea_id, usuario_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE voto ADD CONSTRAINT FK_BAC56C7A5B6FEF7D FOREIGN KEY (idea_id) REFERENCES idea (id)');
        $this->addSql('ALTER TABLE voto ADD CONSTRAINT FK_BAC56C7ADB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE voto');
    }
}
