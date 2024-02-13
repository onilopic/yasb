<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240213084911 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Change table names';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('ALTER TABLE symfony_demo_post_tag RENAME TO yasb_post_tag;');
        $this->addSql('ALTER TABLE symfony_demo_comment RENAME TO yasb_comment;');
        $this->addSql('ALTER TABLE symfony_demo_user RENAME TO yasb_user');
        $this->addSql('ALTER TABLE symfony_demo_post RENAME TO yasb_post');
        $this->addSql('ALTER TABLE symfony_demo_tag RENAME TO yasb_tag;');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE yasb_post_tag RENAME TO symfony_demo_post_tag;');
        $this->addSql('ALTER TABLE yasb_comment RENAME TO symfony_demo_comment;');
        $this->addSql('ALTER TABLE yasb_user RENAME TO symfony_demo_user');
        $this->addSql('ALTER TABLE yasb_post RENAME TO symfony_demo_post');
        $this->addSql('ALTER TABLE yasb_tag RENAME TO symfony_demo_tag;');
    }
}
