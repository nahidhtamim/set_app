<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle_assignment extends Model
{
    use HasFactory;
    protected $table = 'vehicle_assignments';

    protected $fillable = [
        'vehicle_id',
        'place_id',
        'assignment_details',
        'assignment_status',
    ];

    public function place_inf()
    {
        return $this->belongsTo(Place::class,'place_id','id');
    }

    public function vehicle_inf()
    {
        return $this->belongsTo(vehicle::class,'vehicle_id','id');
    }
}
