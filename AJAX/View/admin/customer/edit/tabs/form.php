<?php
$customers = $this->getCustomer();
$option = $customers->getStatusOption();
$group = $this->getGroup();

?>

<h1>Customer Form</h1>
<form id='form' action="<?php echo $this->getUrl()->getUrl('save', NULL, ['customerId' => $customers->customerId], true); ?>" method="POST">
    <table>
        <tr>
            <td>
                Group:
            </td>
            <td>
                <select name="customer[groupId]">
                    <?php foreach ($group as $key => $value) : ?>
                        <option value="<?php echo $value['groupId'] ?>"><?php echo $value['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                First Name:
            </td>
            <td>
                <input type="text" name="customer[firstName]" value="<?php echo $customers->firstName; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Last Name:
            </td>
            <td>
                <input type="text" name="customer[lastName]" value="<?php echo $customers->lastName; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <input type="text" name="customer[email]" value="<?php echo $customers->email; ?>">
            </td>
        </tr>
        <tr>
            <td>
                Passsword:
            </td>
            <td>
                <input type="text" name="customer[password]" value="<?php echo $customers->password; ?>"><br><br>
            </td>
        </tr>
        <tr>
            <td>
                Status:
            </td>
            <td>
                <select name="customer[status]">
                    <?php foreach ($option as $key => $value) : ?>
                        <option value="<?php echo $key; ?>" <?php if ($customers->status == $key) {
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