<?php 

namespace Model;

class Checkout extends \Model\Core\Table
{
    
    public function getShippingCharge()
    {
        if ($_POST['shipment'] == 'Platinum') {
            return $charge = 100;
        }
        else if ($_POST['shipment']  == 'Gold') {
            return $charge = 50;
        }
        else
        {
            return $charge = 0;
        }
    }

}

?>