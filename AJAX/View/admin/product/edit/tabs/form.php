<?php
$product = $this->getProduct();
$option = $product->getStatusOption();
?>

<h1>Product Update Form</h1>
<form id="form" action="<?php echo $this->getUrl()->getUrl('save',NULL,['productId'=>$product->productId],true); ?>" method="POST">
<table class="grid">
    <tr>
        <td>SKU</td>
        <td><input type="text" name="product[sku]" value="<?php echo $product->sku; ?>"></td>
    </tr>
    <tr>
        <td>Name</td>
        <td><input type="text" name="product[name]" value="<?php echo $product->name; ?>"></td>
    </tr>
    <tr>
        <td>Price</td>
        <td><input type="text" name="product[price]" value="<?php echo $product->price; ?>"></td>
    </tr>
    <tr>
        <td>Discount</td>
        <td><input type="text" name="product[discount]" value="<?php echo $product->discount; ?>"></td>
    </tr>
    <tr>
        <td>Quantity</td>
        <td><input type="number" name="product[quantity]" value="<?php echo $product->quantity; ?>"></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><textarea name="product[description]"><?php echo $product->description; ?></textarea></td>
    </tr>
    <tr>
        <td>Status</td>
        <td>
            <select name="product[status]">
                <?php foreach($option as $key=>$value): ?>
                    <option value="<?php echo $key; ?>" <?php if($product->status == $key){echo "selected";} ?> ><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td><input type="button" onclick="mage.setForm()" value="Save" class="btn btn-primary"></td>
    </tr>
</table>
</form>