<?php

namespace Controller\Admin\Product;

class Media extends \Controller\Core\Admin
{
    public function addImageAction()
    {
        $media = \Mage::getModel('Model\Product\Media');
        $id = $this->getRequest()->getGet('productId');
        $name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $location = 'Upload/';

        if (move_uploaded_file($tmp_name, $location . $name)) {
            $media->image = $location . $name;
            $media->label = $name;
            $media->productId = $id;
            $data = $media->getData();
            // $query = "INSERT INTO `{$media->getTableName()}` (" . implode(",", array_keys($data)) . ") VALUES ('" . implode("','", array_values($data)) . "')";
            $media->save();
        }

        $product = \Mage::getModel('Model\Product');
        $leftBlock = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
        $editBlock = \Mage::getBlock('Block\Admin\Product\Edit');
        $editBlock = $editBlock->setTab($leftBlock)->setTableRow($product)->toHtml();
        $this->makeResponse($editBlock);
    }

    public function updateImageAction()
    {
        // echo "<pre>";
        $radio = [];
        $media = \Mage::getModel('Model\Product\Media');
        $id = $this->getRequest()->getGet('productId');
        if (!$id) {
            throw new \Exception("Product is not available");
        }
        $data = $this->getRequest()->getPost();

        if (array_key_exists('small', $data)) {
            $radio['small'] = $data['small'];
        }
        if (array_key_exists('thumb', $data)) {
            $radio['thumb'] = $data['thumb'];
        }
        if (array_key_exists('base', $data)) {
            $radio['base'] = $data['base'];
        }
        // print_r($radio);
        foreach ($data['label'] as $key => $value) {
            $query = "UPDATE `{$media->getTableName()}` SET `label` = '{$data['label'][$key]}',";
            foreach ($radio as $key2 => $value2) {
                if ($value2 == $key) {
                    $query .= "`{$key2}` = 1,";
                } else {
                    $query .= "`{$key2}` = 0,";
                }
            }
            $query .= "`gallery` = ";
            if (array_key_exists('gallery', $data) && array_key_exists($key, $data['gallery'])) {
                $query .= "1";
            } else {
                $query .= "0";
            }
            $query .= " WHERE `{$media->getPrimaryKey()}` = '{$key}'";
            $media->save($query);
        }
        $leftBlock = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
        $editBlock = \Mage::getBlock('Block\Admin\Product\Edit');
        $editBlock = $editBlock->setTab($leftBlock)->setTableRow($media)->toHtml();
        $this->makeResponse($editBlock);
    }

    public function removeImageAction()
    {
        $media = \Mage::getModel('Model\Product\Media');
        if ($this->getRequest()->getPost('delete')) {
            $ids = $this->getRequest()->getPost('delete');

            if ($ids) {
                foreach ($ids as $key => $value) {
                    $media = $media->load($key);
                    $id = $media->imageId;
                    $query = "Delete FROM `{$media->getTableName()}` WHERE `{$media->getPrimaryKey()}` = '{$id}'";
                    if (unlink($media->image)) {
                        $media->delete($query);
                    }
                }
            }
        }
        $leftBlock = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
        $editBlock = \Mage::getBlock('Block\Admin\Product\Edit');
        $editBlock = $editBlock->setTab($leftBlock)->setTableRow($media)->toHtml();
        $this->makeResponse($editBlock);
    }

    // public function formAction()
    // {
    //     try {
    //         $formBlock = \Mage::getBlock("Block\Admin\Product\Edit");

    //         $layout = $this->getLayout();

    //         $content = $layout->getChild('content');
    //         $content->addChild($formBlock);
    //         $layout->setTemplate("View/core/layout/three_column.php");

    //         $left = $layout->getChild('left');
    //         $leftContent = \Mage::getBlock('Block\Admin\Product\Edit\Tabs');
    //         $left->addChild($leftContent);

    //         echo $layout->toHtml();
    //     } catch (\Exception $e) {
    //         $this->getMessage()->setFailure($e->getMessage());
    //         $this->redirect('grid');
    //     }
    // }
}
