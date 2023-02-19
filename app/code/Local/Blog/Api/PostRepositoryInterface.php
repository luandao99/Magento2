<?php
namespace Local\Blog\Api;

use Local\Blog\Api\Data\PostInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
interface PostRepositoryInterface
{
    public function save(PostInterface $post);
    public function getById($postId);
    public function delete(PostInterface $post);
    public function deleteById($postId);
    public function getList(SearchCriteriaInterface $searchCriteriaInterface);


}
