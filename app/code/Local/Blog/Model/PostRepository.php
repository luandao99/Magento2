<?php

namespace Local\Blog\Model;

use Local\Blog\Api\Data\PostInterface;
use Local\Blog\Api\Data\PostSearchResultInterfaceFactory;
use Local\Blog\Api\PostRepositoryInterface;
use Local\Blog\Model\ResourceModel\Post;
use Local\Blog\Model\ResourceModel\CollectionFactory;
use Local\Blog\Model\PostFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Exception\TemporaryState\CouldNotSaveException;
use Magento\Framework\Api\SearchCriteriaInterface;

class PostRepository implements PostRepositoryInterface
{
    private $postResource;
    private $postFactory;
    private $collectionFactory;
    private $postSearchResultFactory;
    private $collectionProcessorInterface;
    public function __construct(
        Post $postResource,
        PostFactory $postFactory,
        CollectionFactory $collectionFactory,
        CollectionProcessorInterface $collectionProcessorInterface,
        PostSearchResultInterfaceFactory $postSearchResultFactory
    ) {
        $this->postResource = $postResource;
        $this->postFactory = $postFactory;
        $this->collectionFactory = $collectionFactory;
        $this->collectionProcessorInterface = $collectionProcessorInterface;
        $this->postSearchResultFactory = $postSearchResultFactory;
    }
    public function save(PostInterface $post)
    {
        try {
            $this->postResource->save($post);
        } catch (\Exception $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        }
        return $post;
    }
    public function getById($postId)
    {
        $post = $this->postFactory->create();
        $this->postResource->load($post, $postId);
        if (!$post->getId()) {
            throw new NoSuchEntityException(__('%1 doesn not exist', $postId));
        }
        return $post;
    }
    public function delete(PostInterface $post)
    {
        try {
            $this->postResource->delete($post);
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__($e->getMessage()));
        }
        return true;
    }
    public function deleteById($postId)
    {
        try {
            $this->delete($this->getById($postId));
        } catch (\Exception $e) {
            throw new CouldNotDeleteException(__($e->getMessage()));
        }
        return true;
    }
    public function getList(SearchCriteriaInterface $searchCriteriaInterface)
    {
        $collection = $this->collectionFactory->create();
        $this->collectionProcessorInterface->process($searchCriteriaInterface, $collection);
        $searchResult = $this->postSearchResultFactory->create();
        $searchResult->setSearchCriteria($searchCriteriaInterface);
        $searchResult->setItems($collection->getItems());
        $searchResult->setTotalCount($collection->getSize());
        return $searchResult;
    }
}
