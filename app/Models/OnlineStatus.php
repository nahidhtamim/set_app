<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineStatus extends Model
{
    use HasFactory;

    protected $table = 'online_statuses';

    protected $fillable = [
        'online_status',
        'customer_id',
    ];
}
