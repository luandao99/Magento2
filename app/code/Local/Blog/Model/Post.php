<?php

namespace Local\Blog\Model;

use Magento\Framework\Model\AbstractModel;
use Local\Blog\Api\Data\PostInterface;

class Post extends AbstractModel implements PostInterface
{
    protected function _construct()
    {
        $this->_init('Local\Blog\Model\ResourceModel\Post');
    }
    public function getId()
    {
        return $this->getData(self::BLOG_ID);
    }
    public function setId($id)
    {
        return $this->setData(self::BLOG_ID, $id);
    }
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }
}
