<?php
namespace AHT\Blog\Controller\Index;

class Delete extends \Magento\Framework\App\Action\Action {

    protected $_postFactory;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \AHT\Blog\Model\PostFactory $postFactory
    ){
        $this->_postFactory = $postFactory;
        parent::__construct($context);
    }

    public function execute(){
       $id = $this->getRequest()->getParam('post_id');
       $model = $this->_postFactory->create();
       $model->load($id)->delete();
       return $this->_redirect('blog/index/index');
    }
}