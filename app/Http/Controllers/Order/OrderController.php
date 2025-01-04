<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\Order\OrderResource;
use App\Services\Order\OrderService;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    protected OrderService $orderService;

    /**
     * OrderController constructor.
     * @param OrderService $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Get all orders
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $orders = $this->orderService->all();
        return ApiResponse::success(OrderResource::collection($orders));
    }

    /**
     * Sync orders with Shopify
     * @return JsonResponse
     */
    public function syncWithShopify(): JsonResponse
    {
        $this->orderService->sync();
        return ApiResponse::success(message: 'Orders synced successfully');
    }
}
