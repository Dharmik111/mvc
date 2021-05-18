<nav class="navbar navbar-expand-md navbar-light bg-light" style="background-color: orange;">
    <a class="navbar-brand mb-0 h1" style="width: 8rem;" href="javascript:void(0)" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('index', 'dashboard') ?>">DashBoard</a>
    <a class="navbar-brand mb-0 h1" style="width: 8rem;" href="javascript:void(0)" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'question') ?>').resetParams().load();">Question</a>
    <a class="navbar-brand mb-0 h1" style="width: 8rem;" href="javascript:void(0)" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'admin') ?>').resetParams().load();">Admin</a>
    <a class="navbar-brand mb-0 h1" style="width: 8rem;" href="javascript:void(0)" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'attribute') ?>').resetParams().load();">Attribute</a>
    <a class="navbar-brand mb-0 h1" style="width: 8rem;" href="javascript:void(0)" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'cart') ?>').resetParams().load();">Cart</a>
    <a class="navbar-brand mb-0 h1" style="width: 8rem;" href="javascript:void(0)" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'category') ?>').resetParams().load();">Category</a>
    <a class="navbar-brand mb-0 h1" style="width: 8rem;" href="javascript:void(0)" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'cmsPages') ?>').resetParams().load();">CmsPage</a>
    <a class="navbar-brand mb-0 h1" style="width: 10rem;" href="javascript:void(0)" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'configGroup') ?>').resetParams().load();">Config Group</a>
    <a class="navbar-brand mb-0 h1" style="width: 8rem;" href="javascript:void(0)" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'customer') ?>').resetParams().load();">Customer</a>
    <a class="navbar-brand mb-0 h1" style="width: 12rem;" href="javascript:void(0)" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'customerGroup') ?>').resetParams().load();">CustomerGroup</a>
    <a class="navbar-brand mb-0 h1" style="width: 8rem;" href="javascript:void(0)" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'payment') ?>').resetParams().load();">Payment</a>
    <a class="navbar-brand mb-0 h1" style="width: 8rem;" href="javascript:void(0)" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'product') ?>').resetParams().load();">Product</a>
    <a class="navbar-brand mb-0 h1" style="width: 8rem;" href="javascript:void(0)" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'shipping') ?>').resetParams().load();">Shipping</a>
</nav>