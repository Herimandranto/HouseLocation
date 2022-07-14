<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220714195520 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE house_categorie (house_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_B2CA08EA6BB74515 (house_id), INDEX IDX_B2CA08EABCF5E72D (categorie_id), PRIMARY KEY(house_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE house_categorie ADD CONSTRAINT FK_B2CA08EA6BB74515 FOREIGN KEY (house_id) REFERENCES house (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE house_categorie ADD CONSTRAINT FK_B2CA08EABCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE house ADD user_id INT NOT NULL');
        $this->addSql('ALTER TABLE house ADD CONSTRAINT FK_67D5399DA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_67D5399DA76ED395 ON house (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE house_categorie');
        $this->addSql('ALTER TABLE house DROP FOREIGN KEY FK_67D5399DA76ED395');
        $this->addSql('DROP INDEX IDX_67D5399DA76ED395 ON house');
        $this->addSql('ALTER TABLE house DROP user_id');
    }
}
