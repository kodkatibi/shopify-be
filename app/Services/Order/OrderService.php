<?php

namespace App\Services\Order;

use App\Models\Customer;
use App\Models\Order;
use App\Services\BaseService;
use App\Services\Customer\CustomerService;
use App\Services\Shopify\ShopifyService;
use Illuminate\Support\Carbon;

class OrderService extends BaseService
{
    protected CustomerService $customerService;

    /**
     * Create a new class instance.
     * @param Order $order
     * @param CustomerService $customerService
     */
    public function __construct(Order $order, CustomerService $customerService)
    {
        $this->customerService = $customerService;
        parent::__construct($order);
    }

    /**
     * Sync orders with Shopify
     * @return void
     */
    public function sync(): void
    {
        $shopifyService = new ShopifyService();
        $query = '
            {
            orders(first: 10) {
    edges {
      node {
        id
        email
        name
        totalPrice,
        createdAt,
        confirmed
        customer {
          id
          firstName
          lastName
          email
          displayName
        }
      }
    }
  }
            }
        ';
        $response = $shopifyService->query($query);
        $orders = $response['data']['orders']['edges'];
        foreach ($orders as $order) {
            $customerInfo = $order['node']['customer'];
            $orderInfo = $order['node'];
            $customer = $this->customerService->firstOrCreate(
                [
                    'shopify_id' => $customerInfo['id']
                ],
                [
                    'name' => $customerInfo['firstName'],
                    'last_name' => $customerInfo['lastName'],
                    'email' => $customerInfo['email'],

                ]);
            $this->firstOrCreate(
                [
                    'customer_id' => $customer->id,
                    'shopify_id' => $order
                ],
                [
                    'customer_id' => $customer->id,
                    'shopify_id' => $orderInfo['id'],
                    'name' => $orderInfo['name'],
                    'email' => $orderInfo['email'],
                    'amount' => $orderInfo['totalPrice'],
                    'confirmed' => $orderInfo['confirmed'],
                    'order_date' => Carbon::create($orderInfo['createdAt']),
                ]);
        }
    }
}
