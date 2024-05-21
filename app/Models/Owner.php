<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Owner extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'name',
        'birth_date',
        'gender',
        'cpf_cnpj',
        'email',
        'address_zip_code',
        'address_street',
        'address_number',
        'address_block',
        'address_city',
        'address_state',
    ];
    
    public function cars() {
        return $this->hasMany(Cars::class);
    }
}
