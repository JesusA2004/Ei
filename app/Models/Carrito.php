<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Carrito extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sesion_id',
        'cliente_id',
        'productos',
        'total',
    ];

}
