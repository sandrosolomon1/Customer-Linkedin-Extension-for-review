<?php
namespace Vendor\ModuleName\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $eavTable1 = $installer->getTable('quote_address');
        $eavTable2 = $installer->getTable('sales_order_address');
        $columns = [
            'linkedin_profile' => [
                'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
                'nullable' => false,
                'comment' => 'linkedin profile',
            ]
        ];
        $connection = $installer->getConnection();
        foreach ($columns as $name => $definition) {
            $connection->addColumn($eavTable1, $name, $definition);
            $connection->addColumn($eavTable2, $name, $definition);
        }
        $installer->endSetup();
    }
}
