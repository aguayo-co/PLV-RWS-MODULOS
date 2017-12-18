<?php

namespace Prilov\Customerpersonalization\Model\Customer\Attribute\Source;

use Magento\Shipping\Model\Config;

class DeliveryMethods extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{

    public $_Allshippingmethods;
    public function __construct(Config $shipconfig)
    {
        $this->_Allshippingmethods = $shipconfig;
    }
    /**
     * getAllOptions
     *
     * @return array
     */
    public function getAllOptions()
    {

        $this->_options = array();
        $ShippingOptions = $this->_Allshippingmethods->getActiveCarriers();
       
        foreach ($ShippingOptions as $carrierCode => $carrierModel) {
            
            $shippingOption = $carrierModel->getAllowedMethods();
            
            array_push($this->_options, ['value' =>key($shippingOption), 'label' => key($shippingOption)]);

        }
        return $this->_options;
    }
}
