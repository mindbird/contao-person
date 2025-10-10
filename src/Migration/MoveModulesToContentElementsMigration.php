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
        return $this->connection->executeQuery("SELECT * FROM tl_module WHERE type = 'person_list'")->columnCount() > 0;
    }

    public function run(): MigrationResult
    {
        $modules = $this->connection->fetchAllAssociative("SELECT * FROM tl_module WHERE type = 'person_list'");

        foreach ($modules as $module) {
            // Create a new content element
            $this->connection->insert('tl_content', [
                'tstamp' => time(),
                'type' => 'person_list',
                'ptable' => 'tl_theme',
                'pid' => $module['pid'],
                'name' => $module['name'],
                'headline' => $module['headline'],
                'person_archiv' => $module['person_archiv'],
                'imgSize' => $module['imgSize'],
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