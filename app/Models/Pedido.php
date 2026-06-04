<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    // Ahora guardamos los IDs de las conexiones, no los nombres
    protected $fillable = [
        'cliente_id',
        'producto_id',
        'cantidad',
        'estado',
    ];

    // Un pedido pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Un pedido pertenece a un producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
