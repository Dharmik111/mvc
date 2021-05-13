<?php

namespace Controller\Admin;

class Checkout extends \Controller\Core\Admin
{
    public function gridAction()
    {
        $cart = $this->getCart();
        $grid = \Mage::getBlock('Block\Admin\Checkout\Grid')->setCart($cart);
        $layout = $this->getLayout();
        $layout->getContent()->addChild($grid);
        $this->renderLayout();
    }

    public function getCart($customerId = null)
    {
        $session = \Mage::getModel('Model\Admin\Session');
        if ($customerId) {
            $session->customerId = $customerId;
        }
        $cart = \Mage::getModel('Model\Cart');
        $query = "SELECT * FROM `{$cart->getTableName()}` WHERE `customerId` = '{$session->customerId}'";
        $cart = $cart->fetchRow($query);
        if ($cart) {
            return $cart;
        }
        $cart = \Mage::getModel('Model\Cart');
        $cart->customerId = $session->customerId;
        $cart->save();
        return $cart;
    }

    public function updateAction()
    {
        echo 1;
    }

    public function selectShipmentAction()
    {
        $shipmentMethod = $this->getRequest()->getPost('shipment');
        $this->redirect('grid');

    }

    // public function getCart($customerId = null)
    // {
    //     $session = \Mage::getModel('Model\Admin\Session');
    //     if ($customerId) {
    //         $session->customerId = $customerId;
    //     }
    //     // $sessionId = \Mage::getModel('Model\Admin\Session')->getId();
    //     $cart = \Mage::getModel('Model\Cart');
    //     $query = "SELECT * FROM `{$cart->getTableName()}` WHERE `customerId` = '{$session->customerId}'";
    //     $cart = $cart->fetchRow($query);
    //     if ($cart) {
    //         return $cart;
    //     }
    //     $cart = \Mage::getModel('Model\Cart');
    //     $cart->customerId = $session->customerId;
    //     $cart->save();
    //     return $cart;
    // }

    
}
