<?php
$customerGroup = $this->getCustomerGroup();
$option = $customerGroup->getStatusOption();
?>

<h1>Customer Group Update Form</h1>
<form id="form" action="<?php echo $this->getUrl()->getUrl('save', NULL, ['groupId' => $customerGroup->groupId], true); ?>" method="POST">
    <table>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <input type="text" name="customerGroup[name]" value="<?php echo $customerGroup->name; ?>"><br><br>
            </td>
        </tr>
        <tr>
            <td>
                Status:
            </td>
            <td>
                <select name="customerGroup[status]">
                    <?php foreach ($option as $key => $value) : ?>
                        <option value="<?php echo $key; ?>" <?php if ($customerGroup->status == $key) {
                                                                echo "selected";
                                                            } ?>><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select><br><br>
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <input type="button" onclick="mage.resetParams().setForm('#form')" value="Submit"><br><br>
            </td>
        </tr>
    </table>
</form>