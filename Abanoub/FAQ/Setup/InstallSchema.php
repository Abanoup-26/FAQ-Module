<?php

namespace Abanoub\FAQ\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

// Db Schema Installition Start

/**
 * class InstallSchema
 * @package Abanoub\FAQ\Setup
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Install FAQ Table
     * @Param SchemaSetupInterface $setup
     * @Param ModuleContextInterface $context
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
        $tableName = $setup->getTable("Fresh_FAQ");
        if ($setup->getConnection()->isTableExists($tableName) != true) {
            $table = $setup->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'Id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true,
                    ],
                    'AskedQuestion_id'
                )->addColumn(
                    'Question',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false],
                    'This is Question'
                )->addColumn(
                    'Answer',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => False],
                    'This is the Answer'
                )->addColumn(
                    'Priority',
                    Table::TYPE_SMALLINT,
                    null,
                    [   
                        'unsigned' => true,
                        'nullable' => false
                    ],
                    'Priotiy'
                )->setComment('FAQSchema');

            $setup->getConnection()->createTable($table);
        }
        $setup->endSetup();
    }
}
// Db Schema Installition End
