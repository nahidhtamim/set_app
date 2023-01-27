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
        'wash_program_number',
        'dryer_program_number',
    ];

}
