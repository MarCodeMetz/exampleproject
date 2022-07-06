<?php
namespace BlueAcorn\RestApi\Model;

class Product extends \Magento\Framework\Api\AbstractExtensibleObject implements \BlueAcorn\RestApi\Api\Data\ProductInterface
{
    const KEY_SKU = 'sku';
    const KEY_NAME = 'name';
    const KEY_PRICE = 'price';

    /**
     * {@inheritDoc}
     */
    public function getSku()
    {
        return $this->_get(self::KEY_SKU);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return $this->_get(self::KEY_NAME);
    }

    /**
     * {@inheritDoc}
     */
    public function getPrice()
    {
        return $this->_get(self::KEY_PRICE);
    }

    /**
     * @param string $sku
     * return $this
     */
    public function setSku($sku)
    {
        return $this->setData(self::KEY_SKU, $sku);
    }

    /**
     * @param string $name
     * return $this
     */
    public function setName($name)
    {
        return $this->setData(self::KEY_NAME, $name);
    }

    /**
     * @param string $price
     * return $this
     */
    public function setPrice($price)
    {
        return $this->setData(self::KEY_PRICE, $price);
    }
}
