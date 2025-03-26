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
        'foto', // se guarda el nombre del archivo
    ];

    protected $perPage = 20;
}
