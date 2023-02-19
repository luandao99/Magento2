<?php

namespace Local\Blog\Block;
use Magento\Framework\Api\SortOrder;
use Magento\Framework\View\Element\Template;
use Local\Blog\Api\Data\PostInterface;
use Local\Blog\Model\PostRepository;
use Local\Blog\Model\ResourceModel\CollectionFactory;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SortOrderBuilder;

class MyBlock extends Template
{
    protected $collectFactory;
    private $filterBuilder;
    private $searchCriteriaBuilder;
    private $sortOrderBuilder;
    private $postRepository;

    public function __construct(
        Template\Context $context,
        CollectionFactory $collectFactory,
        FilterBuilder $filterBuilder,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        SortOrderBuilder $sortOrderBuilder,
        PostRepository $postRepository

    ) {
        $this->collectFactory = $collectFactory;
        $this->filterBuilder = $filterBuilder;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->sortOrderBuilder = $sortOrderBuilder;
        $this->postRepository = $postRepository;

        parent::__construct($context);
    }
    public function getRepositoryCollection()
    {
        $filter[] = $this->filterBuilder->setConditionType('like')
            ->setField(PostInterface::TITLE)
            ->setValue('Title%')
            ->create();
        $this->searchCriteriaBuilder->addSortOrder($this->sortOrderBuilder
            ->setField(PostInterface::BLOG_ID)
            ->setDirection(SortOrder::SORT_DESC)
            ->create());
            $this->searchCriteriaBuilder->setPageSize(2);
            $this->searchCriteriaBuilder->setCurrentPage(1);
            $this->searchCriteriaBuilder->addFilters($filter);
            return $this->postRepository->getList($this->searchCriteriaBuilder->create())->getItems();

    }

    public function updateTestName()
    {
        return $this->collectFactory
            ->addFieldToFilter(PostInterface::TITLE, ['like' => 'Title%'])
            ->setOrder(PostInterface::BLOG_ID, SortOrder::SORT_DESC)
            ->setPageSize(3)
            ->setCurPage(1);
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
