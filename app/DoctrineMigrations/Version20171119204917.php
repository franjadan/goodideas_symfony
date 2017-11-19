<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20171119204917 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE idea ADD prioridad_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE idea ADD CONSTRAINT FK_A8BCA45BDD13D7A FOREIGN KEY (prioridad_id) REFERENCES prioridad (id)');
        $this->addSql('CREATE INDEX IDX_A8BCA45BDD13D7A ON idea (prioridad_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE idea DROP FOREIGN KEY FK_A8BCA45BDD13D7A');
        $this->addSql('DROP INDEX IDX_A8BCA45BDD13D7A ON idea');
        $this->addSql('ALTER TABLE idea DROP prioridad_id');
    }
}
