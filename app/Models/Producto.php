<?php

namespace App\Models;

use MongoDB\Laravel\Auth\User as BaseMongoModel;

/**
 * Class Producto
 *
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Producto extends BaseMongoModel 
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

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
