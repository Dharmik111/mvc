<?php
$question = $this->getQuestion();
$option=$question->getStatusOption();
// print_r($option);die;
?>
<h1><?= $this->getTitle() ?></h1>
<form method="POST" id="form" action="<?php echo $this->getUrl()->getUrl('save'); ?>">
    <table class="grid">
        <tr class="gridtr">
            <td class="gridtd">Enter Question</td><br><br>
            <td class="gridtd"><textarea height="50" width="80" name=question[question] ><?php echo $question->question;?></textarea></td>
        </tr>
        <tr class="gridtr">
            <td class="gridtd">Status</td><br><br>
            <td class="gridtd">
                <select name="question[status]">
                <?php foreach($option as $key=>$value): ?>
                    <option value="<?php echo $key; ?>" <?php if($question->status == $key){echo "selected";} ?> ><?php echo $value; ?></option>
                <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr class="gridtr">
            <td class="gridtd"></td>
            <td class="gridtd">
                <input type="button" onclick="mage.setForm()" class="btn btn-success" value="Save">
            </td>
        </tr>
    </table>
</form>