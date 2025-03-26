<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Producto extends Model 
{
    protected $collection = 'productos';

    protected $primaryKey = '_id';
    protected $keyType = 'string';
    public $incrementing = false;
    
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'cantidad',
        'categoria',
        'foto'
    ];

    protected $perPage = 20;
}
