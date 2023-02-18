<?php
namespace Local\Blog\Api\Data;

interface PostInterface
{
    const TITLE= 'title';
    const DESCRIPTION= 'description';
    const BLOG_ID= 'blog_id';
    public function getId();
    public function setId($id);
    public function getDescription();
    public function setDescription($description);
    public function getTitle();
    public function setTitle($title);


}
