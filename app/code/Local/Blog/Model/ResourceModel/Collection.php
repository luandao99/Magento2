<?php
namespace Local\Blog\Model\ResourceModel;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName='blog_id';
    protected function _construct()
    {
        $this->_init('Local\Blog\Model\Blog','Local\Blog\Model\ResourceModel\Blog');
    }  
}