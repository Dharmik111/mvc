<?php $attribute = $this->getAttribute();
$options = $attribute->getStatusOption();
?>


<h1><?= $this->getTitle() ?></h1>
<form id="form" action="<?php echo $this->getUrl()->getUrl('save'); ?>" method="POST">
    <table class="grid">
        <tr class="gridtr">
            <td class="gridtd">
                Entity Type Id:
            </td>
            <td class="gridtd">
                <select name="attribute[entityTypeId]">
                    <?php foreach ($attribute->getEntityTypeOptions() as $key => $value) : ?>
                        <option value="<?php echo $key ?>" <?php if ($key == $attribute->entityTypeId) echo "selected"; ?>><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select><br><br>
            </td>
        </tr>
        <tr class="gridtr">
            <td class="gridtd">
                Name:
            </td>
            <td class="gridtd">
                <input type="text" name="attribute[name]" value="<?php echo $attribute->name; ?>"><br><br>
            </td>
        </tr>
        <tr class="gridtr">
            <td class="gridtd">
                Code:
            </td>
            <td class="gridtd">
                <input type="text" name="attribute[code]" value="<?php echo $attribute->code; ?>"><br><br>
            </td>
        </tr>
        <tr class="gridtr">
            <td class="gridtd">
                Back End Type:
            </td>
            <td class="gridtd">
                <select name="attribute[backendType]">
                    <?php foreach ($attribute->getBackendTypeOption() as $key => $value) : ?>
                        <option value="<?= $key ?>" <?php if ($key == $attribute->backEndType) {
                                                        echo "selected";
                                                    } ?>><?= $value ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr class="gridtr">
            <td class="gridtd">
                Input Type:
            </td>
            <td class="gridtd">
                <select name="attribute[inputType]">
                    <?php foreach ($attribute->getInputTypeOption() as $key => $value) : ?>
                        <option value="<?= $key ?>" <?php if ($key == $attribute->inputType) {
                                                        echo "selected";
                                                    } ?>><?= $value ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr class="gridtr">
            <td class="gridtd">
                Sort Order:
            </td>
            <td class="gridtd">
                <input type="text" name="attribute[sortOrder]" value="<?php echo $attribute->sortOrder; ?>"><br><br>
            </td>
        </tr>
        <tr class="gridtr">
            <td class="gridtd">
                Back End Model:
            </td>
            <td class="gridtd">
                <input type="text" name="attribute[backEndModel]" value="<?php echo $attribute->backEndModel; ?>"><br><br>
            </td>
        </tr>
        <tr class="gridtr">
            <td class="gridtd"></td>
            <td class="gridtd">
                <input type="button" onclick="mage.setForm()" value="Save">
            </td>
        </tr>
    </table>
</form>