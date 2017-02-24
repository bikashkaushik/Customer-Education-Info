<?php

class Bk_Customerdetails_Model_Mysql4_Extendedinfo extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct() {    
        $this->_init('customerdetails/extendedinfo', 'info_id');
    }
} 