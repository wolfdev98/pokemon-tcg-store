<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    // Muestra todas las ventas (solo admin)
    public function index()
    {
        $ventas = Venta::with('user')->latest()->get();
        return view('ventas.index', compact('ventas'));
    }
}
