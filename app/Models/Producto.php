<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Producto extends Model 
{
    protected $collection = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'cantidad', 
        'categoria',
    ];

    protected $perPage = 20;
}
