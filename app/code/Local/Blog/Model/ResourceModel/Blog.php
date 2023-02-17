<?php
namespace Local\Blog\Model\ResourceModel;
class Blog extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('local_blog','blog_id');
    }
}