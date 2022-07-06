<?php
namespace BlueAcorn\RestApi\Api\Data;

interface ProductInterface
{
    /**
     * @return string|null
     */
    public function getSku();

    /**
     * @param [string] $sku
     * @return $this
     */
    public function setSku($sku);

    /**
     * @return string|null
     */
    public function getName();

    /**
     * @param [string] $name
     * @return $this
     */
    public function setName($name);

    /**
     * @return float|null
     */
    public function getPrice();

    /**
     * @param [float] $price
     * @return $this
     */
    public function setPrice($price);
}
