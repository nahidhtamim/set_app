<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laundry extends Model
{
    use HasFactory;

    protected $table = 'laundries';

    protected $fillable = [
        'customer_id',
        'set_id',
        'washing_program',
        'cloth_group',
        'cloth_type',
        'fabric',
        'sportswear_type',
        'laundry_description',
        'status',
    ];

    public function user_inf()
    {
        return $this->belongsTo(user::class,'customer_id','id');
    }
    public function washing_program_inf()
    {
        return $this->belongsTo(washing_program::class,'washing_program','id');
    }
    public function cloth_group_inf()
    {
        return $this->belongsTo(cloth_group::class,'cloth_group','id');
    }
    public function cloth_type_inf()
    {
        return $this->belongsTo(cloth_type::class,'cloth_type','id');
    }
    public function fabric_inf()
    {
        return $this->belongsTo(fabric::class,'fabric','id');
    }
    public function sportswear_inf()
    {
        return $this->belongsTo(sportswear::class,'sportswear_type','id');
    }
}
