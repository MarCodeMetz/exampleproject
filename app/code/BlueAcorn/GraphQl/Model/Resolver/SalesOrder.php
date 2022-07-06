<?php
namespace BlueAcorn\GraphQl\Model\Resolver;

use \Magento\Framework\GraphQl\Query\ResolverInterface;
use \Magento\Framework\GraphQl\Config\Element\Field;
use \Magento\Framework\GraphQl\Schema\Type\ResolveInfo;
use \Magento\Sales\Api\OrderRepositoryInterface;


class SalesOrder implements ResolverInterface
{
    public function __construct(
        OrderRepositoryInterface $orderRepository
    ) {
        $this->orderRepository = $orderRepository;
    }

    public function resolve(
        Field $field,
        $context,
        ResolveInfo $info,
        array $value = null,
        array $args = null
    ){
        $orderId = $args['id'];
        $order = $this->orderRepository->get($orderId);

        $shippingAddressArray = [];

        $shippingAddressArray['shipping_name'] = $order->getShippingAddress()->getData('firstname') . ' ' . $order->getShippingAddress()->getData('lastname');
        $shippingAddressArray['city'] = $order->getShippingAddress()->getData('city');
        $shippingAddressArray['state'] = $order->getShippingAddress()->getData('region');
        $shippingAddressArray['postcode'] = $order->getShippingAddress()->getData('postcode');

        $orderData = [
            'increment_id' => $order->getIncrementId(),
            'customer_name' => $order->getCustomerFirstname() . ' ' . $order->getCustomerLastname(),
            'grand_total' => $order->getGrandTotal(),
            'is_guest_customer' => $order->getCustomerIsGuest(),
            'address_array' => $shippingAddressArray
        ];

        return $orderData;
    }
}
