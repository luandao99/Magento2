<?php

namespace Local\Blog\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Local\Blog\Model\PostFactory;
use Magento\Framework\Controller\ResultFactory;
use Local\Blog\Model\ResourceModel\Post;

class Delete extends Action
{
    private $postFactory;
    private $postResource;
    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(Context $context, PostFactory $postFactory, Post $postResource)
    {
        parent::__construct($context);
        $this->postFactory = $postFactory;
        $this->postResource = $postResource;
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $id =$this->getRequest()->getParam('id');
        $postList = $this->postFactory->create();
        $postList->setId($id);
        try {
            $this->postResource->delete($postList);
        } catch (\Exception $e) {
        }
        // // Chuyển hướng trang về trang cũ
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('learning');

        return $resultRedirect;
    }
}
