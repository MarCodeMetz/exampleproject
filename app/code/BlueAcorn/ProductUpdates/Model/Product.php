<?php declare(strict_types=1);

namespace BlueAcorn\ProductUpdates\Model;
class Product
{
   /**
     * after Get product name
     *
     * @return string
     * @codeCoverageIgnoreStart
     */
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result)
    {
        return $subject->getBrand() . '-' . $result;    
    }
}