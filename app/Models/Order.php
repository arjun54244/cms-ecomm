<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'customer_name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'postal_code',
        'subtotal',
        'shipping_charge',
        'discount',
        'tax',
        'grand_total',
        'payment_method',
        'payment_status',
        'razorpay_order_id',
        'razorpay_payment_id',
        'razorpay_signature',
        'status',
        'paid_at',
        'failed_at',
        'cancelled_at',
        'customer_note',
        'admin_note',
    ];

    protected $casts = [
        'subtotal'        => 'decimal:2',
        'shipping_charge' => 'decimal:2',
        'discount'        => 'decimal:2',
        'tax'             => 'decimal:2',
        'grand_total'     => 'decimal:2',
        'paid_at'         => 'datetime',
        'failed_at'       => 'datetime',
        'cancelled_at'    => 'datetime',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}