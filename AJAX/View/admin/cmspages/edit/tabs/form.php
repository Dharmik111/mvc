<?php $cmsPages = $this->getCmsPages(); ?>
<?php //print_r(htmlspecialchars($cmsPages->content));die;?>
<?php $options = $cmsPages->getStatusOption(); ?>

<h1><?= $this->getTitle();?></h1><br><br>
<form id="form" action='<?php echo $this->getUrl()->getUrl('save', null, ['pageId' => $cmsPages->pageId], false)?>' method='POST'>
    <table>
        <tr>
            <td>
                Title:
            </td>
            <td>
                <input name='cmsPages[title]' type='text' value='<?php echo $cmsPages->title; ?>'>
            </td>
        </tr>
        <tr>
            <td>
                Identifier:
            </td>
            <td>
                <input name='cmsPages[identifier]' type='text' value='<?php echo $cmsPages->identifier; ?>'>
            </td>
        </tr>
        
        <tr>
            <td>
                Status:
            </td>
            <td>
                <select name='cmsPages[status]'>
                    <?php foreach ($options as $key => $value) : ?>
                        <option value='<?php echo $key; ?>' <?php if ($cmsPages->status == $key) echo 'selected'; ?>><?php echo $value;?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
    <div class="form-row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8 mb-1">
        <div class="adjoined-bottom">
            <div class="grid-container">
                <div class="grid-width-100">
                    <div id="editor">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2"></div>
    </div>
        <tr>
            <td></td>
            <td>
                <input type='button' class="btn btn-success" onclick="object.resetParams().setParams(getContent()).setForm('#form').load()" name='submit' value='Submit'>
            </td>
        </tr>
    </table>
    
    <input type="hidden" name="cmsPages[content]" id="myContent">
    <input type="hidden" value="<?php echo htmlentities($cmsPages->content); ?>" id="setcontent">
</form>

<script>
    initSample();
    function getContent() {
        var data = CKEDITOR.instances.editor.getData();
        document.getElementById("myContent").value = data;
    }
    var setdata = document.getElementById("setcontent").value;
    CKEDITOR.instances['editor'].setData(setdata);
</script>
