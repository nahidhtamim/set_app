<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service_cycle_location extends Model
{
    use HasFactory;

    protected $table = 'service_cycle_locations';

    protected $fillable = [
        'location',
    ];
}
