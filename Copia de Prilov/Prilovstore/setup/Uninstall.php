<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Prilov\Prilovstore\Setup;

use Magento\Framework\Setup\ModuleContextInterface;

class Uninstall implements \Magento\Framework\Setup\UninstallInterface
{
    protected $eavSetupFactory;
    public function __construct(\Magento\Eav\Setup\EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }
    public function uninstall(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
    {
        $setup->startSetup();

        $eavSetup = $this->eavSetupFactory->create();

        $entityTypeId = 1; // Find these in the eav_entity_type table
        $eavSetup->removeAttribute($entityTypeId, 'my_measurements');

        $setup->endSetup();

    }
}
