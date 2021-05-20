<?php
$category = $this->getCategory();
$categories = $this->getCategories();
$option = $category->getStatusOption();
$categoryOptions = $this->getCategoryOptions();
?>
<h2 style="text-align:center ;"><?=$this->getTitle();?></h2>

<form id='form' action="<?= $this->getUrl()->getUrl('save', NULL, ['categoryId' => $category->categoryId], true); ?>" method="POST">

    <select name="category[parentId]">
        <?php if ($categoryOptions) : ?>
            <?php foreach ($categoryOptions as $categoryId => $name) : ?>
                <option value="<?= $categoryId; ?>" <?php if ($categoryId == $category->parentId){echo 'selected';}?>><?= $name; ?></option>
            <?php endforeach; ?>
        <?php endif; ?>
    </select><br>

    <label for="name" class="font-weight-bold">Name</label><br>
    <input type="text" class="form-control" name="category[name]" value="<?= $category->name; ?>">

    <label for="status" class="font-weight-bold">Status</label><br>
    <select name="category[status]">
        <?php foreach ($option as $key => $value) : ?>
            <option value="<?= $key; ?>" <?php if ($category->status == $key) {
                                                    echo "selected";
                                                } ?>><?= $value; ?></option>
        <?php endforeach; ?>
    </select><br><br>
    <button type="button" name="save" class="btn btn-warning" onclick="mage.setForm('#categoryForm');">Save</button>

</form>
