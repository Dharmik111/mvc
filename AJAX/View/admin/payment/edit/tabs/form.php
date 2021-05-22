<?php
$payments = $this->getPayment();

$option = $payments->getStatusOption();
?>

<h1>Payment Update Form</h1>
<form id="form" action="<?php echo $this->getUrl()->getUrl('save', NULL, ['methodId' => $payments->methodId], true); ?>" method="POST">
    <table>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <input type="text" name="payment[name]" value="<?php echo $payments->name; ?>">
            </td>
        </tr>
        <tr>
            <td>
                code:
            </td>
            <td>
                <input type="text" name="payment[code]" value="<?php echo $payments->code; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Description:
            </td>
            <td>
                <textarea name="payment[description]"><?php echo $payments->description; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                Status:
            </td>
            <td>
                <select name="payment[status]">
                    <?php foreach ($option as $key => $value) : ?>
                        <option value="<?php echo $key; ?>" <?php if ($payments->status == $key) {
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
                <input type='button' onclick="mage.resetParams().setForm('#form')" name='submit' value='Submit'>
            </td>
        </tr>
    </table>

</form>