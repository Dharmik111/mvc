<?php

$customer = $this->getCustomer();
$billing = $customer->getBillingAddress();
$shipping = $customer->getShippingAddress();

?>

<h1>Customer Address Form</h1>
<form id="form" action="<?php echo $this->getUrl()->getUrl('addressSave',null, ['customerId' => $this->getRequest()->getGet('customerId')], true); ?>" method="POST">
   <table> <tr>
   <tr colspan="2">
        <td><strong><center>Billing Address</center></strong></td>
    </tr>
    <tr>
        <td>
            Address:
        </td>
        <td>
            <input type="text" name="billing[address]" value="<?php echo $customer->getAddressValue('billing', 'address'); ?>">
        </td>
    </tr>
    <tr>
        <td>
            City:
        </td>
        <td>
            <input type="text" name="billing[city]" value="<?php echo $customer->getAddressValue('billing', 'city'); ?>">
        </td>
    </tr>
    <tr>
        <td>
            State:
        </td>
        <td>
            <input type="text" name="billing[state]" value="<?php echo $customer->getAddressValue('billing', 'state'); ?>">
        </td>
    </tr>
    <tr>
        <td>
            Zip Code:
        </td>
        <td>
            <input type="text" name="billing[zipCode]" value="<?php echo $customer->getAddressValue('billing', 'zipCode'); ?>">
        </td>
    </tr>
    <tr>
        <td>
            Country:
        </td>
        <td>
            <input type="text" name="billing[country]" value="<?php echo $customer->getAddressValue('billing', 'country'); ?>">
        </td>
    </tr>
    </tr><br><br>
    <tr>
    <tr colspan="2">
        <td><strong><center>Shipping Address</center></strong></td>
    </tr>
    <tr>
        <td>
            Address:
        </td>
        <td>
            <input type="text" name="shipping[address]" value="<?php echo $customer->getAddressValue('shipping', 'address'); ?>">
        </td>
    </tr>
    <tr>
        <td>
            City:
        </td>
        <td>
            <input type="text" name="shipping[city]" value="<?php echo $customer->getAddressValue('shipping', 'city'); ?>">
        </td>
    </tr>
    <tr>
        <td>
            State:
        </td>
        <td>
            <input type="text" name="shipping[state]" value="<?php echo $customer->getAddressValue('shipping', 'state'); ?>">
        </td>
    </tr>
    <tr>
        <td>
            Zip Code:
        </td>
        <td>
            <input type="text" name="shipping[zipCode]" value="<?php echo $customer->getAddressValue('shipping', 'zipCode'); ?>">
        </td>
    </tr>
    <tr>
        <td>
            Country:
        </td>
        <td>
            <input type="text" name="shipping[country]" value="<?php echo $customer->getAddressValue('shipping', 'country'); ?>">
        </td>
    </tr>
    <tr>
        <td>
            <input type="button" onclick="mage.resetParams().setForm('#form');" value="Save">
        </td>
        <td>
            <input type="reset" value="Reset">
        </td>
    </tr>
    </tr>
   </table>
</form>