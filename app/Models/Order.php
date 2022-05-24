<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'customer_id',
        'sport_id',
        'place_id',
        'service_id',
        'locker_id',
        'shipping_name',
        'shipping_address',
        'shipping_phone',
        'shipping_email',
        'billing_name',
        'billing_address',
        'billing_phone',
        'billing_email',
        'message',
        'order_status'
    ];
}
