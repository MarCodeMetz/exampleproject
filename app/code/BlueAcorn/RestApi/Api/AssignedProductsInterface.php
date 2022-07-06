<?php
namespace BlueAcorn\RestApi\Api;

interface AssignedProductsInterface
{
    /**
     * Get products assigned to a category
     * 
     * @param int $categoryId
     * @return BlueAcorn\RestApi\Api\Data\ProductInterface[]
     */
    public function getAssignedProducts($categoryId);
}
