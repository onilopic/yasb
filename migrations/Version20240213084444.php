<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240213084444 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Change pages content to text';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE yasb_pages ALTER content TYPE TEXT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE yasb_pages ALTER content TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE yasb_post_tag RENAME TO symfony_demo_post_tag;');
        $this->addSql('ALTER TABLE yasb_comment RENAME TO symfony_demo_comment;');
        $this->addSql('ALTER TABLE yasb_user RENAME TO symfony_demo_user');
        $this->addSql('ALTER TABLE yasb_post RENAME TO symfony_demo_post');
        $this->addSql('ALTER TABLE yasb_tag RENAME TO symfony_demo_tag;');
    }
}
