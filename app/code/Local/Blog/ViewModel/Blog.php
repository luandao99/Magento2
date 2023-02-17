<?php

namespace Local\Blog\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Local\Blog\Model\Blog as BlogModel;

class Blog implements ArgumentInterface
{
    private $collectionFactory;
    public function _construct(BlogModel $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }
    public function getCollection()
    {
        $product = $this->collectionFactory->load();
        return $product;
    }
}
