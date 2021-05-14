<?php
$question = $this->getQuestion();
$option = $question->getOptions();

?>
<form method="POST" id="form" action="<?php echo $this->getUrl()->getUrl('save', 'question\option'); ?>">
    <input type="button" id="update" name="update" value="Update" onclick="mage.setForm();" class="btn btn-success">
    <input type="button" name="addOption" value="Add Option" onclick="addRow();" class="btn btn-primary">
    <table id="existingOption" class="grid">
        <tbody>
            <?php if ($option) : ?>
                <?php foreach ($option as $key => $value) : ?>
                    <tr class="gridtr">
                        <td class="gridtd"><input type="text" name="exist[choice][<?php echo $value->choiceId; ?>]" value="<?php echo $value->choice ?>"></td>
                        <td class="gridtd"><input type="radio" name="exist[answer]" value="<?php echo $value->choiceId ?>" <?php if ($value->is_right_choice) {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>></td>
                        <td class="gridtd"><input type="button" class="btn btn-danger" name="removeOption" value="Remove Option" onclick="removeRow(this);"></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</form>
<div style="display:none">
    <table id="newOption">
        <tbody>
            <tr class="gridtr">
                <td class="gridtd"><input type="text" name="new[choice][]"></td>
                <!-- <td class="gridtd newOption"><input type="radio" name="exist[answer][]"></td> -->
                <td class="gridtd"><input type="button" class="btn btn-danger" name="new[removeOption][]" value="Remove Option" onclick="removeRow(this);"></td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    function addRow() {
        var newOptionTable = document.getElementById('newOption');
        var existingOptionTable = document.getElementById('existingOption').children[0];
        existingOptionTable.prepend(newOptionTable.children[0].children[0].cloneNode(true));
    }

    function removeRow(button) {
        var objTr = button.parentElement.parentElement;
        objTr.remove();
        $form = document.getElementById('form');
        $form = mage.setForm();
    }

</script>