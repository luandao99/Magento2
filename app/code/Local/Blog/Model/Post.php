<?php

namespace Local\Blog\Model;

use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Local\Blog\Model\ResourceModel\Post');
    }
}
