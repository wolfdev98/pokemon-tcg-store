<?php

// Le dice a Laravel dónde vive este archivo
namespace App\Models;

// Importa la clase Model de Laravel para poder usarla
use Illuminate\Database\Eloquent\Model;

// Esta clase representa la tabla 'pedidos' en la base de datos
class Pedido extends Model
{
    // $fillable le dice a Laravel qué columnas se pueden llenar
    // desde un formulario, es una medida de seguridad
    protected $fillable = [
        'cliente',
        'producto',
        'cantidad',
        'estado',
    ];
}
