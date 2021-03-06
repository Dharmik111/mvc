<?php $attribute = $this->getAttribute(); ?>
<?php $options = $attribute->getOptions(); ?>

<form id="form" action="<?php echo $this->getUrl()->getUrl('update','attribute\option'); ?>" method="POST">
    <input type="button" onclick="mage.resetParams().setForm('#form')" class="btn btn-success" name="update" value="Update">
    <input type="button" name="addOption" class="btn btn-primary" value="Add Option" onclick="addRow();">
    <table id='existingOption' class='grid'>
        <tbody>
            <?php if($options): ?>
                <?php foreach($options as $key=>$option): ?>
                <tr class='gridtr'>
                    <td class='gridtd'><input type="text" name="exist[<?php echo $option->optionId; ?>][name]" value="<?php echo $option->name ?>"></td>
                    <td class='gridtd'><input type="text" name="exist[<?php echo $option->optionId; ?>][sortOrder]" value="<?php echo $option->sortOrder ?>"></td>
                    <td class='gridtd'><input type="button" class="btn btn-danger" name="removeOption" value="Remove Option" onclick="removeRow(this);"></td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</form>
<div style="display:none">
    <table id='newOption'>
        <tbody>
            <tr class='gridtr'>
                <td class='gridtd'><input type="text" name="new[name][]"></td>
                <td class='gridtd'><input type="text" name="new[sortOrder][]"></td>
                <td class='gridtd'><input type="button" name="new[removeOption][]" class="btn btn-danger" value="Remove Option" onclick="removeRow(this)"></td>
            </tr>
        </tbody>
    </table>
</div>

<script>

function addRow(){
    var newOptionTable = document.getElementById('newOption');
    var existingOptionTable = document.getElementById('existingOption').children[0];
    existingOptionTable.prepend(newOptionTable.children[0].children[0].cloneNode(true));
}

function removeRow(button){
    var objTr = button.parentElement.parentElement;
    objTr.remove();
    $form=document.getElementById('form');
    $form=mage.setForm();
}

</script>