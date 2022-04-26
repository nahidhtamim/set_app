<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceService extends Model
{
    use HasFactory;

    protected $table = 'place_services';

    protected $fillable = [
        'place_id',
        'service_id',
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

}
