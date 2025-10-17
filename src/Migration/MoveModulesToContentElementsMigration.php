<?php

namespace Mindbird\Contao\Person\Migration;

use Contao\CoreBundle\Migration\AbstractMigration;
use Contao\CoreBundle\Migration\MigrationResult;
use Doctrine\DBAL\Connection;

class MoveModulesToContentElementsMigration extends AbstractMigration
{

    public function __construct(private readonly Connection $connection)
    {
    }


    public function shouldRun(): bool
    {
        return count($this->connection->executeQuery("SELECT * FROM tl_module WHERE type = 'person_list'")->fetchAllAssociative()) > 0;
    }

    public function run(): MigrationResult
    {
        $schemaManager = $this->connection->createSchemaManager();
        $contentColumns = $schemaManager->listTableColumns('tl_content');
        if (!isset($contentColumns['person_archiv'])) {
            $this->connection->executeQuery("
            ALTER TABLE
                tl_content
            ADD
                person_Archiv int(10) unsigned NOT NULL default '0'
        ");
        }
        if (!isset($contentColumns['title'])) {
            $this->connection->executeQuery("
            ALTER TABLE
                tl_content
            ADD
                title varchar(255) NOT NULL default ''
        ");
        }

        $modules = $this->connection->fetchAllAssociative("SELECT * FROM tl_module WHERE type = 'person_list'");
        foreach ($modules as $module) {
            // Create a new content element
            $this->connection->insert('tl_content', [
                'tstamp' => time(),
                'type' => 'person_list',
                'ptable' => 'tl_theme',
                'title' => $module['name'],
                'pid' => $module['pid'],
                'headline' => $module['headline'],
                'person_archiv' => $module['person_archiv'],
                'size' => $module['imgSize'],
                'sorting' => 128, // Default sorting value
            ]);

            $id = $this->connection->lastInsertId();
            $this->connection->update('tl_content', [
                'cteAlias' => $id,
                'type' => 'content_element'
            ], [
                'module' => $module['id'],
                'type' => 'module'
            ]);

            $this->connection->delete('tl_module', ['id' => $module['id']]);
        }

        return new MigrationResult(true, sprintf('Migrated %d modules to content elements.', count($modules)));
    }
}