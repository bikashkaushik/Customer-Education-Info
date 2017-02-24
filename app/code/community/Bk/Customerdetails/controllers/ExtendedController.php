<?php

class Bk_Customerdetails_ExtendedController extends Mage_Core_Controller_Front_Action
{
    /**
     * Checking if user is logged in or not
     * If not logged in then redirect to customer login
     */
    public function preDispatch()
    {
        parent::preDispatch();
        if (!Mage::getSingleton('customer/session')->authenticate($this)) {
            $this->setFlag('', 'no-dispatch', true);
        // adding message in customer login page
        Mage::getSingleton('core/session')
                ->addSuccess(Mage::helper('customerdetails')->__('Please sign in or create a new account'));
        }
    }  

    /**
     * Retrieve Customerdetails helper
     *
     * @return Bk_Customerdetails_Helper_Data
     */
    protected function _getHelper()
    {
        return Mage::helper('customerdetails');
    }

    /**
     * @return Customer Extended Info
     */
    public function infoAction() {
    	$handles = array('default');
        if (Mage::getSingleton('customer/session')->isLoggedIn()) {
            $handles[] = 'customer_account';// setting the handle for same layout
        }
        $this->loadLayout($handles);
        $this->getLayout()->getBlock('head')->setTitle($this->__('Extended Information'));
        $this->renderLayout();
    }

    public function saveExtendedInfoAction() {
        if (!$this->_validateFormKey()) {
            return $this->_redirect('*/*/info');
        }
        
        if ($this->getRequest()->isPost()) {
            $post = $this->getRequest()->getPost();
            $_collection = Mage::getModel('customerdetails/extendedinfo')->load($post['entity_id'], 'entity_id');

            unset($post['info_id']);
            unset($post['entity_id']);
            unset($post['form_key']);
            
            try {
                $_collection->setData('matriculation_year', $post['matriculation_year']);
                $_collection->setData('matriculation_school', $post['matriculation_school']);
                $_collection->setData('matriculation_city', $post['matriculation_city']);
                $_collection->setData('matriculation_stream', $post['matriculation_stream']);
                $_collection->setData('matriculation_marks', $post['matriculation_marks']);
                $_collection->setData('intermediate_year', $post['intermediate_year']);
                $_collection->setData('intermediate_school', $post['intermediate_school']);
                $_collection->setData('intermediate_city', $post['intermediate_city']);
                $_collection->setData('intermediate_stream', $post['intermediate_stream']);
                $_collection->setData('intermediate_marks', $post['intermediate_marks']);
                $_collection->setData('graduation_year', $post['graduation_year']);
                $_collection->setData('graduation_institute', $post['graduation_institute']);
                $_collection->setData('graduation_university', $post['graduation_university']);
                $_collection->setData('graduation_city', $post['graduation_city']);
                $_collection->setData('graduation_stream', $post['graduation_stream']);
                $_collection->setData('graduation_marks', $post['graduation_marks']);
                $_collection->setData('pgraduation_year', $post['pgraduation_year']);
                $_collection->setData('pgraduation_institute', $post['pgraduation_institute']);
                $_collection->setData('pgraduation_university', $post['pgraduation_university']);
                $_collection->setData('pgraduation_city', $post['pgraduation_city']);
                $_collection->setData('pgraduation_stream', $post['pgraduation_stream']);
                $_collection->setData('pgraduation_marks', $post['pgraduation_marks']);
                $_collection->save();
            } catch (Mage_Core_Exception $e) {
                Mage::getSingleton('core/session')->addError($e->getMessage());
                $this->_redirect('*/*/info');
                return;
            }
        }

        $this->_redirect('*/*/info');
    }

}
