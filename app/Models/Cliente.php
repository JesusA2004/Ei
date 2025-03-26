<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Cliente extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'direccion',
    ];


}
