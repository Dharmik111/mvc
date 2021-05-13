<?php

namespace Controller\Admin;

class Attribute extends \Controller\Core\Admin
{

    public function gridAction()
    {
        $grid = \Mage::getBlock('Block\Admin\Attribute\Grid')->toHtml();
        $this->makeResponse($grid);
    }

    public function editFormAction()
    {
        try {
            $attribute = \Mage::getModel('Model\Attribute');
            $id = $this->getrequest()->getGet('attributeId');
            if ($id) {
                $attribute = $attribute->load($id);
                if (!$attribute) {
                    throw new \Exception('No Record Found!!');
                }
            }
            $leftBlock = \Mage::getBlock('Block\Admin\Attribute\Edit\Tabs');
            $editBlock = \Mage::getBlock('Block\Admin\Attribute\Edit');
            $editBlock = $editBlock->setTab($leftBlock)->setTableRow($attribute)->toHtml();
            $this->makeResponse($editBlock);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function saveAction()
    {
        try {
            $attribute = \Mage::getModel('Model\Attribute');
            $id = $this->getRequest()->getGet('attributeId');
            $data = $this->getRequest()->getPost('attribute');
            $model = \Mage::getModel('Model\\' . $data['entityTypeId']);
            $columnName = $data['name'];
            $type = $data['backendType'];
            $query = "ALTER TABLE `{$model->getTableName()}` ADD ";
            $query .= "$columnName ";
            $query .= "$type";
            $model->getAdapter()->insert($query);
            if ($id) {
                $attribute = $attribute->load($id);
                if (!$attribute) {
                    throw new \Exception("Record Not Found.");
                }
            }
            $attribute = $attribute->setData($data);
            if ($attribute->save()) {
                if ($id) {
                    $this->getMessage()->getSuccess("Successfully Updated.");
                } else {
                    $this->getMessage()->setSuccess("Successfully Inserted.");
                }
            } else {
                if ($id) {
                    $this->getMessage()->getFailure("Unable to Update.");
                } else {
                    $this->getMessage()->setFailure("Unable to Inserte.");
                }
            }

            $grid = \Mage::getBlock('Block\Admin\Attribute\Grid')->toHtml();
            $this->makeResponse($grid);
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
    }

    public function deleteAction()
    {
        try {
            $attribute = \Mage::getModel("Model\Attribute");
            $attributeOption = \Mage::getModel('Model\Attribute\Option');
            $id = $this->getRequest()->getGet('attributeId');
            if (!$id) {
                throw new \Exception("Attribute not found in database.");
            }
            $attribute = $attribute->load($id);
            if (!$attribute) {
                throw new \Exception('Id is Invalid');
            }
            $query = "SELECT * FROM `{$attributeOption->getTableName()}` WHERE `{$attribute->getPrimaryKey()}` = '{$id}';";
            $attributeOption = $attributeOption->fetchAll($query)->getData();
            if ($attribute->delete()) {
                if ($attributeOption) {
                    $attribute->delete();
                }
                $query = "ALTER TABLE `{$attribute->entityTypeId}` DROP COLUMN `{$attribute->name}`";
                $model = \Mage::getModel('Model\\'.$attribute->entityTypeId);
                $model = $model->save($query);
                $this->getMessage()->setSuccess("Delete Successfully");
            }
        } catch (\Exception $e) {
            $this->getMessage()->setFailure($e->getMessage());
        }
        $grid = \Mage::getBlock('Block\Admin\Attribute\Grid')->toHtml();
        $this->makeResponse($grid);
    }

    public function filterAction()
    {
        $filterData = $this->getRequest()->getPost('field');
        $this->getFilter()->setFilters($filterData);
        $grid = \Mage::getBlock('Block\Admin\Attribute\Grid')->toHtml();
        $this->makeResponse($grid);
    }
}
// ALTER TABLE table_name DROP COLUMN column_name; table_name.