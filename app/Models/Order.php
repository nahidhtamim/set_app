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
        'dob',
        'gender',
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



    public function customer_inf()
    {
        return $this->belongsTo(User::class,'customer_id','id');
    }

    public function sport_inf()
    {
        return $this->belongsTo(Sport::class,'sport_id','id');
    }

    public function place_inf()
    {
        return $this->belongsTo(Place::class,'place_id','id');
    }

    public function place_service_inf()
    {
        return $this->belongsTo(PlaceService::class,'service_id','id');
    }

    public function place_locker_inf()
    {
        return $this->belongsTo(PlaceLocker::class,'locker_id','id');
    }

    public function order_statuses_inf()
    {
        return $this->belongsTo(order_status::class,'order_status','id');
    }
}
