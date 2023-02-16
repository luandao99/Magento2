<?php
namespace Local\Blog\ViewModel;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class Blog implements ArgumentInterface
{
    public function __construct()
    {
         
    }
    public function getTitle()
    {
        return 'Blog View Model';
    }
}
