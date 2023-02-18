<?php

namespace Local\Blog\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Local\Blog\Model\PostFactory;
use Magento\Framework\Controller\ResultFactory;
use Local\Blog\Model\ResourceModel\Post;

class Save extends Action
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
        // $this->resultFactory = $resultFactory;
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $title = $this->getRequest()->getParam('title');
        $description = $this->getRequest()->getParam('description');
        $postList = $this->postFactory->create();
        $postList->setData(
            ['title' => $title, 'description' => $description]
        );
        try{
            $this->postResource->save($postList);
        } catch(\Exception $e)
        {}
        // Chuyển hướng trang về trang cũ
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('learning');

        return $resultRedirect;
    }
}
