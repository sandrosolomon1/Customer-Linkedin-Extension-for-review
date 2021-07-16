<?php
namespace Alliance\Linkedin\Plugin\Checkout\Model;

class ShippingInformationManagementPlugin
{
    public function beforeSaveAddressInformation($subject,\Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation,$result)
    {
        if($addressInformation->getExtensionAttributes()) {
            $addressInformation->setLinkedinProfile($addressInformation->getExtensionAttributes()->getLinkedinProfile());
        }
        return $result;
    }
}
