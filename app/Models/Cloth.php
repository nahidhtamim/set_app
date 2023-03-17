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
        'size',
        'color',
        'fabric',
        'weight',
        'brand',
        'image',
        'wash_program_number',
        'dryer_program_number',
    ];

    public function customer_inf()
    {
        return $this->belongsTo(User::class,'customer_id','id');
    }

}
