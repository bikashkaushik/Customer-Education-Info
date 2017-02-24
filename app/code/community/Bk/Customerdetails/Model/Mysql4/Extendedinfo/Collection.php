<?php

class Bk_Customerdetails_Model_Mysql4_Extendedinfo_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct() {
        parent::_construct();
        $this->_init('customerdetails/extendedinfo');
    }
} 

