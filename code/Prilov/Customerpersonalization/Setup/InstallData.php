<?php
/**
 * Customization
 * Copyright (C) 2017  2017
 *
 * This file is part of Prilov/Customerpersonalization.
 *
 * Prilov/Customerpersonalization is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Prilov\Customerpersonalization\Setup;

use Magento\Customer\Model\Customer;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{

    private $customerSetupFactory;

    /**
     * {@inheritdoc}
     */
    public function install(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        //Your install script

        $customerSetup = $this->customerSetupFactory->create(['setup' => $setup]);

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'mobile_number', [
            'type'     => 'varchar',
            'label'    => 'Teléfono',
            'input'    => 'text',
            'source'   => '',
            'required' => false,
            'visible'  => true,
            'position' => 1000,
            'system'   => false,
            'backend'  => '',
        ]);

        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'mobile_number')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'adminhtml_checkout',
                'customer_account_create',
                'customer_account_edit',
            ]]);
        $attribute->save();

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'score_positive', [
            'type'     => 'int',
            'label'    => 'Calificaciones Positivas',
            'input'    => 'text',
            'source'   => '',
            'required' => false,
            'visible'  => true,
            'position' => 1001,
            'system'   => false,
            'backend'  => '',
        ]);

        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'score_positive')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'adminhtml_checkout',
                'customer_account_create',
                'customer_account_edit',
            ]]);
        $attribute->save();

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'score_negative', [
            'type'     => 'int',
            'label'    => 'Calificaciones Negativas',
            'input'    => 'text',
            'source'   => '',
            'required' => false,
            'visible'  => true,
            'position' => 1002,
            'system'   => false,
            'backend'  => '',
        ]);

        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'score_negative')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'adminhtml_checkout',
                'customer_account_create',
                'customer_account_edit',
            ]]);
        $attribute->save();

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'score_neutral', [
            'type'     => 'int',
            'label'    => 'Calificaciones Neutrales',
            'input'    => 'text',
            'source'   => '',
            'required' => false,
            'visible'  => true,
            'position' => 1003,
            'system'   => false,
            'backend'  => '',
        ]);

        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'score_neutral')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'adminhtml_checkout',
                'customer_account_create',
                'customer_account_edit',
            ]]);
        $attribute->save();

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'vacations_mode', [
            'type'     => 'int',
            'label'    => 'Vacaciones',
            'input'    => 'boolean',
            'source'   => '',
            'required' => false,
            'visible'  => true,
            'position' => 1004,
            'system'   => false,
            'backend'  => '',
        ]);

        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'vacations_mode')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'adminhtml_checkout',
                'customer_account_create',
                'customer_account_edit',
            ]]);
        $attribute->save();

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'prilover_star', [
            'type'     => 'int',
            'label'    => 'Prilover Star',
            'input'    => 'boolean',
            'source'   => '',
            'required' => false,
            'visible'  => true,
            'position' => 1005,
            'system'   => false,
            'backend'  => '',
        ]);

        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'prilover_star')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'adminhtml_checkout',
                'customer_account_create',
                'customer_account_edit',
            ]]);
        $attribute->save();

        $customerSetup->addAttribute(\Magento\Customer\Model\Customer::ENTITY, 'delivery_methods', [
            'type'     => 'varchar',
            'label'    => 'Metodos de Entrega',
            'input'    => 'multiselect',
            'source'   => 'Prilov\Customerpersonalization\Model\Customer\Attribute\Source\DeliveryMethods',
            'required' => true,
            'visible'  => true,
            'position' => 1006,
            'system'   => false,
            'backend'  => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
        ]);

        $attribute = $customerSetup->getEavConfig()->getAttribute('customer', 'delivery_methods')
            ->addData(['used_in_forms' => [
                'adminhtml_customer',
                'adminhtml_checkout',
                'customer_account_create',
                'customer_account_edit',
            ]]);
        $attribute->save();
    }

    /**
     * Constructor
     *
     * @param \Magento\Customer\Setup\CustomerSetupFactory $customerSetupFactory
     */
    public function __construct(
        CustomerSetupFactory $customerSetupFactory
    ) {
        $this->customerSetupFactory = $customerSetupFactory;
    }
}
