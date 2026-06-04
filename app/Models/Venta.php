<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'user_id',
        'total',
        'metodo_pago',
        'productos',
    ];

    // Convierte automáticamente la columna 'productos' (json) en un arreglo
    protected $casts = [
        'productos' => 'array',
    ];

    // Una venta pertenece al usuario que la hizo
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
