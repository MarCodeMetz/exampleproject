<?php declare(strict_types=1);

namespace BlueAcorn\ProductUpdates\Model;
use Magento\Checkout\Model\Cart;

class CartUpdate
{

    public function beforeAddProduct(Cart $subject, $productInfo, $requestInfo)
    {
        $requestInfo['qty'] = $requestInfo['qty'] * 10;
                
        return array($productInfo, $requestInfo);
    }
}
