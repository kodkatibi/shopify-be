<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Customer\CustomerResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'customer_id' => $this->customer_id,
            'shopify_id' => Str::afterLast($this->shopify_id, '/'),
            'order_date' => $this->order_date,
            'amount' => $this->amount,
            'confirmed' => $this->confirmed,
            'customer' => CustomerResource::make($this->customer),
        ];
    }
}
