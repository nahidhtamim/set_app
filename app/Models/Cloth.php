<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cloth extends Model
{
    use HasFactory;

    protected $table = 'cloths';

    protected $fillable = [
        'hexa_code',
        'customer_id',
        'order_id',
        'service_id',
        'set_id',
        // 'cloth_type',
        // 'size',
        // 'color',
        // 'fabric',
        // 'weight',
        // 'brand',
        // 'image',
        'wash_program_number',
        'dryer_program_number',
    ];

    public function customer_inf()
    {
        return $this->belongsTo(User::class,'customer_id','id');
    }

    public function service_inf()
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }

    public function order_inf()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function service_cycle_location_inf()
    {
        return $this->belongsTo(service_cycle_location::class,'wash_program_number','id');
    }
}
