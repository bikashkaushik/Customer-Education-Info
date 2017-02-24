<?php

class Bk_Customerdetails_Block_Extended_Info extends Mage_Core_Block_Template	//Mage_Customer_Block_Form_Edit
{
    
    // protected function _construct()
    // {
    //     parent::_construct();
    //     $this->setTemplate('');
    // }

    public function getCustomerId() {
    	$customer = Mage::getSingleton('customer/session')->getCustomer();
        return $customer->getEntityId();
    }

    public function getCustomerInfo() {
    	$_collection = Mage::getModel('customerdetails/extendedinfo')->load($this->getCustomerId(), 'entity_id');
  		return $_collection;
  	}
}
