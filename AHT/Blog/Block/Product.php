<?php
namespace AHT\Blog\Block;
class Product extends \Magento\Framework\View\Element\Template
{    
    protected $_productCollectionFactory;
    protected $_objectManager;
        
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,        
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,        
        array $data = [],
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Catalog\Helper\Image $imageHelper,
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository
    )
    {    
        $this->_productCollectionFactory = $productCollectionFactory; 
        $this->_objectManager = $objectManager;
        $this->imageHelper = $imageHelper;
        $this->productRepository = $productRepository;
        parent::__construct($context, $data);
    }
    
    public function getProductCollection()
    {
        $collection = $this->_objectManager->create('Magento\Catalog\Model\ResourceModel\Product\Collection');
        $collection->addAttributeToSelect('*');
        // $collection->setPageSize(3); // fetching only 3 products
        return $collection;
    }

    public function getItemImage($productId)
    {
    try {
        $_product = $this->productRepository->getById($productId);
    } catch (NoSuchEntityException $e) {
        return 'product not found';
    }
    $image_url = $this->imageHelper->init($_product, 'product_base_image')->getUrl();
    return $image_url;
    }
}
?>