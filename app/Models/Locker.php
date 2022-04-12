<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    use HasFactory;

    protected $table = 'lockers';

    protected $fillable = [
        'locker_name',
        'locker_size',
        'locker_description',
        'locker_status',
    ];
}
