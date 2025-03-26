<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carrito extends Model
{
    protected $fillable = [
        'user_id',
        'cliente_id',
        'productos',
        'total'
    ];

    protected static function booted()
    {
        static::saving(function ($carrito) {
            if (!$carrito->user_id && !$carrito->cliente_id) {
                throw new \Exception('El carrito debe estar asociado a un usuario admin o cliente');
            }
            
            if ($carrito->user_id && $carrito->cliente_id) {
                throw new \Exception('El carrito no puede pertenecer a ambos tipos de usuario');
            }
        });
    }

    // Relación con usuario admin (desde MySQL)
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    // Relación con usuario cliente (desde MongoDB)
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
}
