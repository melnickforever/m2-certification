<?php

namespace Dmelnyk\Attributes\Setup;

use Magento\Customer\Api\AddressMetadataInterface;
use Magento\Eav\Model\Config;
use Magento\Eav\Setup\EavSetup;
use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class UpgradeData implements UpgradeDataInterface
{
    const CUSTOM_ATTRIBUTE_CODE = "ism_custom";
    /**
     * @var EavSetup
     */
    private $eavSetup;
    /**
     * @var Config
     */
    private $eavConfig;

    public function __construct(EavSetup $eavSetup, Config $config)
    {
        $this->eavSetup = $eavSetup;
        $this->eavConfig = $config;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */


    public function upgrade(
        ModuleDataSetupInterface $setup,
        ModuleContextInterface $context
    )
    {
        $setup->startSetup();

        if (version_compare($context->getVersion(), '0.1.1', '<')) {
            $this->eavSetup->addAttribute(
                AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
                self::CUSTOM_ATTRIBUTE_CODE,
                [
                    'label' => 'Custom',
                    'input' => 'text',
                    'visible' => true,
                    'required' => false,
                    'position' => 150,
                    'sort_order' => 150,
                    'system' => false
                ]
            );
        }
       $customAttribute =  $this->eavConfig->getAttribute(
            AddressMetadataInterface::ENTITY_TYPE_ADDRESS,
            self::CUSTOM_ATTRIBUTE_CODE);

        $customAttribute->setData(
            'used_in_forms',
            ['adminhtml_customer_address', 'customer_address_edit', 'customer_register_address']
        );
        $customAttribute->save();
        $setup->endSetup();
    }

}
