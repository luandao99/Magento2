<?php

namespace Local\Blog\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Local\Blog\Model\Post;
use Local\Blog\Model\ResourceModel\Post as PostResourceModel;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'blog_id';
    // protected $_eventPrefix = 'mymodule_test_collection';

    protected function _construct()
    {
        $this->_init(Post::class, PostResourceModel::class);
    }
}
