<?php
namespace Local\Blog\Model;
class Blog extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init('Local\Blog\Model\ResourceModel\Blog');
    }
}