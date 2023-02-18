<?php

namespace Local\Blog\Block;

use Magento\Framework\View\Element\Template;
use Local\Blog\Model\ResourceModel\CollectionFactory as PostFactory;

class MyBlock extends Template
{
    protected $_testFactory;

    public function __construct(
        Template\Context $context,
        PostFactory $testFactory,
        array $data = []
    ) {
        $this->_testFactory = $testFactory;
        parent::__construct($context, $data);
    }

    public function updateTestName()
    {
        $test = $this->_testFactory->create();
        return $test;
    }
    public function getFormActionUrl()
    {
        return $this->getUrl('*/*/save');
    }
    // public function deleteForm($id)
    // {
    //     $result= $this->getUrl('*/*/delete',$id);
    //     var_dump($result);
    //     die();
    // }
}
