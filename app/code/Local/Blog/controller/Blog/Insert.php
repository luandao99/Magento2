<?php

namespace Local\Blog\controller\Blog;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Action;

class Insert extends Action
{
    protected $resultPageFactory;
    public function __construct(PageFactory $resultPageFactory, Context $context)
    {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $resultPage->getConfig()->getTitle()->set(__('Blog Insert'));
        return $resultPage;
    }
}
