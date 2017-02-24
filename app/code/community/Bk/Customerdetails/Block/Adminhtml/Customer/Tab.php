<?php
class Bk_Customerdetails_Block_Adminhtml_Customer_Tab
extends Mage_Adminhtml_Block_Template
implements Mage_Adminhtml_Block_Widget_Tab_Interface {
 
    public function _construct()
    {
        parent::_construct();
       $this->setTemplate('customerdetails/customer/tab.phtml');
    }
   
    public function getTabLabel()
    {
        return $this->__('Extended Information');
    }
  
    public function getTabTitle()
    {
        return $this->__('Extended Information');
    }
   
    public function canShowTab()
    {
        return true;
    }
   
    public function isHidden()
    {
        return false;
    }
}