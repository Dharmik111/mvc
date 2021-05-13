<?php $product = $this->getProduct(); ?>
<?php $attributes = $this->getAttribute()->getData(); ?>

<?php if ($product) : ?>
    <div class="container-fluid m-0 p-4 col justify-content-center">
        <form action="<?= $this->getUrl()->getUrl('save', 'Product\Attribute',['productId'=>$product->productId], true);?>" method="post" id="form">
            <input type="button" value="Save" onclick="mage.setForm();" class="btn btn-success">
            <div class="col m-0 p-1">
                <?php if (count($attributes)) : ?>
                    <?php foreach ($attributes as $key => $attribute) : ?>
                        <?php if ($attribute->inputType == 'select') : ?>
                            <div class="row m-0 p-1">
                                <div class="col-4 m-0 p-1">
                                    <h5><?php echo $attribute->name; ?></h5>
                                </div>
                                <div class="col-7 m-0 p-0">
                                    <select name="attribute[<?php echo $attribute->code; ?>]">
                                        <?php $options = $this->getAttributeOption($attribute->attributeId)->getData(); ?>
                                        <?php foreach ($options as $key => $option) : ?>
                                            <option value="<?php echo $option->name; ?>" <?php if ($option->name) {
                                                                                                echo "selected";
                                                                                            } ?>>
                                                <?php echo $option->name; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        <?php elseif ($attribute->inputType == 'radio') : ?>
                            <div class="row m-0 p-1">
                                <div class="col-4 m-0 p-1">
                                    <h5><?php echo $attribute->name; ?></h5>
                                </div>
                                <div class="col-7 m-0 p-0">
                                    <?php $options = $this->getAttributeOption($attribute->attributeId)->getData(); ?>
                                    <?php foreach ($options as $key => $option) : ?>
                                        <input class="p-1" type="<?php echo $attribute->inputType; ?>" name="attribute[<?php echo $attribute->code; ?>]" value="<?php echo $option->name; ?>" <?php if ($option->name) {
                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                } ?>>
                                        <?php echo $option->name; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <?php elseif ($attribute->inputType == 'checkbox') : ?>
                            <div class="row m-0 p-1">
                                <div class="col-4 m-0 p-1">
                                    <h5><?php echo $attribute->name; ?></h5>
                                </div>
                                <div class="col-7 m-0 p-0">
                                    <?php $options = $this->getAttributeOption($attribute->attributeId)->getData(); ?>
                                    <?php foreach ($options as $key => $option) : ?>
                                        <input class="p-1" type="<?php echo $attribute->inputType; ?>" name="attribute[<?php echo $attribute->code; ?>]" value="<?php echo $option->name; ?>" <?php if ($option->name) {
                                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                                } ?>>
                                        <?php echo $option->name; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="row m-0 p-1">
                                <div class="col-4 m-0 p-1">
                                    <h5><?php echo $attribute->name; ?></h5>
                                </div>
                                <div class="col-7 m-0 p-0">
                                    <input type="<?php echo $attribute->inputType; ?>" name="attribute[<?php echo $attribute->code; ?>]" value="<?php echo $product->{$attribute->name}; ?>" required>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <center>
                        <p>No Attribute Available</p>
                    </center>
                <?php endif; ?>
            </div>
        </form>
    </div>
<?php else : ?>
    <center>
        <h5>Add Product First</h5>
    </center>
<?php endif; ?>