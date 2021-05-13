<?php

namespace Block\Admin\CheckOut;

class Grid extends \Block\Core\Template
{
    protected $cart = null;
    protected $checkout = null;
    public function __construct()
    {
        $this->setTemplate('View\admin\checkout\grid.php');
    }

    public function getCart()
    {
        if (!$this->cart) {
            throw new \Exception("Cart is not set");
        }
        return $this->cart;
    }

    public function setCart(\Model\Cart $cart)
    {
        $this->cart = $cart;
        return $this;
    }

    public function grandTotal($key)
    {
        return (($this->getCart()->getItems()->getData()[$key]->getData()['totalPrice']) + ($this->getCart()->getData()['shippingAmount']) - ($this->getCart()->getData()['discount']));
    }

    public function getProductName($key)
    {
        $id = ($this->getCart()->getItems()->getData()[$key]->getData()['productId']);
        $product = \Mage::getModel('Model\Product')->load(($this->getCart()->getItems()->getData()[$key]->getData()['productId']));
        print_r($product->name);
    }

    public function getProductPrice($key)
    {
        $id = ($this->getCart()->getItems()->getData()[$key]->getData()['productId']);
        $product = \Mage::getModel('Model\Product')->load($id);
        print_r($product->price);
    }

    public function getSubTotal($key)
    {
        static $a = 0;
        if ($key >= 0) {
            $a += $this->getCart()->getItems()->getData()[$key]->getData()['price'];
            // echo $a;        }
        }
        return $a;
    }

    public function getCheckout()
    {
        if ($this->checkout) {
            throw new \Exception('Enable to proceed checkout');
        }
        return $this->checkout;   
    }

    public function setCheckout(\Model\Checkout $checkout)
    {
        $this->checkout = $checkout;
        return $this;
    }

    

    
}
