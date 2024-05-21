<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cars extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'owner_id',
        'model',
        'brand',
        'year',
        'license_plate',
        'chassis_number',
        'color',
        'engine_number',
        'type',
    ];
    
    public function owners() {
        return $this->belongsTo(Owner::class, 'owner_id');
    }
}
