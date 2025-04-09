<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carrito extends Model
{
    protected $fillable = [
        'cliente_id',
        'productos',
        'total'
    ];

    protected static function booted()
    {
        static::saving(function ($carrito) {
            if (!$carrito->cliente_id) {
                throw new \Exception('El carrito debe estar asociado a un cliente');
            }
        });
    }

    /**
     * Relación con el cliente (almacenado en MongoDB)
     */
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
}
