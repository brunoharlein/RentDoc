<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190206151622 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE documents ADD category_id INT NOT NULL, ADD borrower_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE documents ADD CONSTRAINT FK_A2B0728812469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE documents ADD CONSTRAINT FK_A2B0728811CE312B FOREIGN KEY (borrower_id) REFERENCES borrower (id)');
        $this->addSql('CREATE INDEX IDX_A2B0728812469DE2 ON documents (category_id)');
        $this->addSql('CREATE INDEX IDX_A2B0728811CE312B ON documents (borrower_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE documents DROP FOREIGN KEY FK_A2B0728812469DE2');
        $this->addSql('ALTER TABLE documents DROP FOREIGN KEY FK_A2B0728811CE312B');
        $this->addSql('DROP INDEX IDX_A2B0728812469DE2 ON documents');
        $this->addSql('DROP INDEX IDX_A2B0728811CE312B ON documents');
        $this->addSql('ALTER TABLE documents DROP category_id, DROP borrower_id');
    }
}
