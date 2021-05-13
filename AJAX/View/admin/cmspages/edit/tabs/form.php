<?php $cmsPages = $this->getCmsPages(); ?>
<?php $options = $cmsPages->getStatusOption(); ?>

<h1>CMS Pages Form</h1>
<form id="form" action='<?php echo $this->getUrl()->getUrl('save', null, ['pageId' => $cmsPages->pageId], true); ?>' method='POST'>
    <table>
        <tbody>
            <tr>
                <td>
                    Title:
                </td>
                <td><input name='cmsPages[title]' type='text' value='<?php echo $cmsPages->title; ?>'>
                </td>
            </tr>
            <tr>
                <td>
                    Identifier:
                </td>
                <td><input name='cmsPages[identifier]' type='text' value='<?php echo $cmsPages->identifier; ?>'>
                </td>
            </tr>
            <tr>
                <td>
                    Content:
                </td>
                <td>
                    <input name='cmsPages[content]' type='text' value='<?php echo $cmsPages->content; ?>'><br><br>
                </td>
            </tr>
        </tbody>
        <tr>
            <td>
                Status:
            </td>
            <td>
                <select name='cmsPages[status]'>
                    <?php foreach ($options as $key => $value) : ?>
                        <option value='<?php echo $key; ?>' <?php if ($cmsPages->status) echo 'selected'; ?>><?php echo $value ?></option>
                    <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input class="btn btn-primary" type='button' onclick="mage.setCms().setForm()" name='submit' value='Submit'>
            </td>
        </tr>
        </tbody>
    </table>
</form>

<script>
    CKEDITOR.replace('cmsPages[content]');
</script>