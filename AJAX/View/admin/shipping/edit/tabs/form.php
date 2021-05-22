<?php
$shipping = $this->getShipping();
$option = $shipping->getStatusOption();
?>


<h1>Shipping Update Form</h1>
<form id="form" action="<?php echo $this->getUrl()->getUrl('save', NULL, ['methodId' => $shipping->methodId], true); ?>" method="POST">
    <table>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <input type="text" name="shipping[name]" value="<?php echo $shipping->name; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Code:
            </td>
            <td>
                <input type="text" name="shipping[code]" value="<?php echo $shipping->code; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Amount:
            </td>
            <td>
                <input type="text" name="shipping[amount]" value="<?php echo $shipping->amount; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Description:
            </td>
            <td>
                <textarea name="shipping[description]"><?php echo $shipping->description; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                Status:
            </td>
            <td>
                <select name="shipping[status]">
                    <?php foreach ($option as $key => $value) : ?>
                        <option value="<?php echo $key; ?>" <?php if ($shipping->status == $key) {
                                                                echo "selected";
                                                            } ?>><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <input type="button" onclick="mage.resetParams().setForm('#form')" value="Save">
            </td>
        </tr>
    </table>
</form>