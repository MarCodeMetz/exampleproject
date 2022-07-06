<?php
namespace BlueAcorn\RestApi\Model;

use \BlueAcorn\RestApi\Api\AssignedProductsInterface;
use \BlueAcorn\RestApi\Api\Data\ProductInterfaceFactory;
use \Magento\Catalog\Api\CategoryRepositoryInterface;

class AssignedProducts implements AssignedProductsInterface
{
    /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepository;
 
    /**
     * @var ProductInterfaceFactory
     */
    protected $productInterfaceFactory;

    /**
     * @param CategoryRepositoryInterface $categoryRepository
     * @param ProductInterfaceFactory $productInterfaceFactory
     */
    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        ProductInterfaceFactory $productInterfaceFactory
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->productInterfaceFactory = $productInterfaceFactory;
    }

    public function getAssignedProducts($categoryId)
    {
        $category = $this->categoryRepository->get($categoryId);
        if (!$category->getIsActive()) {
            return [[
                'error' => true,
                'error_desc' => 'Category is disabled'
            ]];
        }

        $products = $category->getProductCollection()
                             ->addFieldToSelect('name')
                             ->addFieldToSelect('price');

        /** @var \BlueAcorn\RestApi\Api\Data\ProductInterface[] $itemsList */
        $itemsList = [];

        /** @var \Magento\Catalog\Model\Product[] $product */
        foreach($products->getItems() as $product)
        {
            /** @var \BlueAcorn\RestApi\Api\Data\ProductInterface $item */
            $item = $this->productInterfaceFactory->create();
            $item->setSku($product->getSku())
                 ->setName($product->getName())
                 ->setPrice($product->getPrice());
            
            $itemsList[] = $item;
        }
        
        return $itemsList;

    }
}
