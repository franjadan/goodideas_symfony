<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171119215324 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE comentario (id INT AUTO_INCREMENT NOT NULL, idea_id INT NOT NULL, usuario_id INT NOT NULL, fecha DATE NOT NULL, texto LONGTEXT NOT NULL, INDEX IDX_4B91E7025B6FEF7D (idea_id), INDEX IDX_4B91E702DB38439E (usuario_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comentario ADD CONSTRAINT FK_4B91E7025B6FEF7D FOREIGN KEY (idea_id) REFERENCES idea (id)');
        $this->addSql('ALTER TABLE comentario ADD CONSTRAINT FK_4B91E702DB38439E FOREIGN KEY (usuario_id) REFERENCES usuario (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE comentario');
    }
}
