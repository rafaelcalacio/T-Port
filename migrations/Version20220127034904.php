<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220127034904 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cliente (id INT AUTO_INCREMENT NOT NULL, nome VARCHAR(100) NOT NULL, cpf VARCHAR(11) NOT NULL, telefone VARCHAR(15) NOT NULL, email VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conteiner (id INT AUTO_INCREMENT NOT NULL, cliente_id INT DEFAULT NULL, numero VARCHAR(11) NOT NULL, tipo VARCHAR(2) NOT NULL, status VARCHAR(5) NOT NULL, categoria VARCHAR(10) NOT NULL, INDEX IDX_32224ADBDE734E51 (cliente_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movimentacao (id INT AUTO_INCREMENT NOT NULL, conteiner_id INT DEFAULT NULL, tipo VARCHAR(18) NOT NULL, inicio DATETIME NOT NULL, fim DATETIME NOT NULL, INDEX IDX_C1BF366A386BF9B8 (conteiner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE conteiner ADD CONSTRAINT FK_32224ADBDE734E51 FOREIGN KEY (cliente_id) REFERENCES cliente (id)');
        $this->addSql('ALTER TABLE movimentacao ADD CONSTRAINT FK_C1BF366A386BF9B8 FOREIGN KEY (conteiner_id) REFERENCES conteiner (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE conteiner DROP FOREIGN KEY FK_32224ADBDE734E51');
        $this->addSql('ALTER TABLE movimentacao DROP FOREIGN KEY FK_C1BF366A386BF9B8');
        $this->addSql('DROP TABLE cliente');
        $this->addSql('DROP TABLE conteiner');
        $this->addSql('DROP TABLE movimentacao');
    }
}
