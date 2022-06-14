<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPayment extends Model
{
    use HasFactory;

    protected $table = 'order_payments';

    protected $fillable = [
        'customer_id',
        'order_id',
        'month',
        'year',
    ];



    public function customer_inf()
    {
        return $this->belongsTo(User::class,'customer_id','id');
    }

    public function order_inf()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function order_details()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
