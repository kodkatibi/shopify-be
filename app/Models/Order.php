<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'shopify_id',
        'order_date',
        'amount',
        'confirmed',
    ];

    protected $casts = [
        'order_date' => 'date',
        'confirmed' => 'boolean',
    ];

    /**
     * @return BelongsTo<Customer>
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
