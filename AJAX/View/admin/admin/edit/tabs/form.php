<?php $admin = $this->getAdmin(); ?>

<h1>Admin Update Form</h1>
<form id='form' action="<?= $this->getUrl()->getUrl('save', NULL, ['adminId' => $admin->adminId], true); ?>" method="POST">
    <table>
        <tr>
            <td>
                User Name:
            </td>
            <td>
                <input type="text" name="admin[userName]" value="<?= $admin->userName; ?>"><br><br>
            </td>
        </tr>
        <tr>
            <td>
                Password:
            </td>
            <td>
                <input type="password" name="admin[password]" value="<?= $admin->password; ?>"><br><br>
            </td>
        </tr>
        <tr>
            <td>
                Status:
            </td>
            <td>
                <select name="admin[status]">
                    <?php foreach ($admin->getStatusOption() as $key => $value) : ?>
                        <option value="<?= $key; ?>" <?php if ($admin->status == $key) {
                                                            echo "selected";
                                                        } ?>><?= $value; ?></option>
                    <?php endforeach; ?>
                </select><br><br>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="button" onclick="mage.setForm()" value="submit" class="btn btn-success">
            </td>
        </tr>
    </table>
</form>