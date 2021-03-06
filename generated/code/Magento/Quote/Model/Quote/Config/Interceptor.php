<?php
namespace Magento\Quote\Model\Quote\Config;

/**
 * Interceptor class for @see \Magento\Quote\Model\Quote\Config
 */
class Interceptor extends \Magento\Quote\Model\Quote\Config implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Model\Attribute\Config $attributeConfig)
    {
        $this->___init();
        parent::__construct($attributeConfig);
    }

    /**
     * {@inheritdoc}
     */
    public function getProductAttributes() : array
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getProductAttributes');
        return $pluginInfo ? $this->___callPlugins('getProductAttributes', func_get_args(), $pluginInfo) : parent::getProductAttributes();
    }
}
