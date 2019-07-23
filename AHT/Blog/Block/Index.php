<?php
namespace AHT\Blog\Block;

class Index extends \Magento\Framework\View\Element\Template {
    private $postFactory;
    private $postRepository;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \AHT\Blog\Model\PostFactory $postFactory,
        \AHT\Blog\Model\PostRepository $postRepositoey)
    {
        parent::__construct($context);
        $this->postFactory = $postFactory;
        $this->postRepository = $postRepositoey;
    }

    public function getBlogInfo()
	{
		return __('AHT Blog module');
	}
	public function getPosts()
	{
		$collection = $this->postRepository->getList();
		// $collection = $post->getCollection();
		return $collection;
	}
}