<?php

namespace Controller\Admin\Customer;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Address extends \Controller\Core\Admin
{
    public function __construct()
    {
        parent::__construct();
    }

    function saveAction()
    {
        try {

            $customer = \Mage::getModel('Model\Customer');
            $billing = \Mage::getModel('Model\Customer\Address');
            $shipping = \Mage::getModel('Model\Customer\Address');
            $address = \Mage::getModel('Model\Customer\Address');
            if (!$this->getRequest()->isPost()) {
                throw new \Exception("Invalide Request.");
            }
            if ($id = $this->getRequest()->getGet('id')) {
                $customer = $customer->load($id);
                if (!$customer) {
                    throw new \Exception("No Record Found.");
                }
                $query = "SELECT * FROM `customer_address` WHERE customerId = {$customer->customerId}";
                $addresses = $address->fetchAll($query);
                if ($addresses) {
                    foreach ($addresses->getData() as $address) {
                        if ($address->addressType == 'billing') {
                            $billing = $address;
                        }
                        if ($address->addressType == 'shipping') {
                            $shipping = $address;
                        }
                    }
                }
            }
            $billingData = $this->getRequest()->getPost('billing');
            $billing->setData($billingData);
            $billing->addressType = 'billing';
            $billing->customerId = $id;
            $recordId = $billing->save();

            $shippingData = $this->getRequest()->getPost('shipping');
            $shipping->setData($shippingData);
            $shipping->addressType = 'shipping';
            $shipping->customerId = $id;
            $recordId = $shipping->save();

            if (!$recordId) {
                throw new \Exception("Please Enter Details First.");
            }
            $this->getMessage()->setSuccess('Address Added Successfully.');
            $grid = \Mage::getBlock('Block\Admin\Customer\Grid')->toHtml();
            // $this->renderLayout($grid);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
            $this->redirect('form','customer');
        }
    }
}