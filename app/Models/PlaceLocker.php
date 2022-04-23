<?php

namespace App\Models;

use App\Models\Place;
use App\Models\Locker;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlaceLocker extends Model
{
    use HasFactory;

    protected $table = 'place_lockers';

    protected $fillable = [
        'place_id',
        'service_id',
        'locker_id',
        'name',
        'code',
        'status',
    ];


    public function place_info()
    {
        return $this->belongsTo(Place::class,'place_id','id');
    }

    public function service_info()
    {
        return $this->belongsTo(Service::class,'service_id','id');
    }

    public function locker_info()
    {
        return $this->belongsTo(Locker::class,'locker_id','id');
    }
}
