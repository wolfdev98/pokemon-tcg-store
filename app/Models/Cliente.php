<?php

// Le dice a Laravel dónde vive este archivo
namespace App\Models;

// Importa la clase Model de Laravel para poder usarla
use Illuminate\Database\Eloquent\Model;

// Esta clase representa la tabla 'clientes' en la base de datos
class Cliente extends Model
{
    // $fillable le dice a Laravel qué columnas se pueden llenar
    // desde un formulario. Es una medida de seguridad para que
    // nadie pueda meter datos en columnas que no queremos
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'direccion',
    ];
}
