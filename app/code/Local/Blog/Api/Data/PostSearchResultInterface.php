<?php
namespace Local\Blog\Api\Data;
use Magento\Framework\Api\SearchResultsInterface;
interface PostSearchResultInterface extends SearchResultsInterface
{
    public function getItems();
    public function setItems(array $items);

}
