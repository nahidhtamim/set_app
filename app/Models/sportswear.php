<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sportswear extends Model
{
    use HasFactory;

    protected $table = 'sportswears';

    protected $fillable = [
        'name'
    ];
}
