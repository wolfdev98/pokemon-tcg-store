<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    // Muestra el carrito
    public function index()
    {
        $carrito = session('carrito', []);
        return view('carrito.index', compact('carrito'));
    }

    // Agrega un producto al carrito
    public function agregar(Producto $producto)
    {
        $carrito = session('carrito', []);

        if (isset($carrito[$producto->id])) {
            $carrito[$producto->id]['cantidad']++;
        } else {
            $carrito[$producto->id] = [
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'imagen' => $producto->imagen,
                'cantidad' => 1,
            ];
        }

        session(['carrito' => $carrito]);
        return redirect()->route('carrito.index');
    }

    // Quita un producto del carrito
    public function eliminar($id)
    {
        $carrito = session('carrito', []);
        unset($carrito[$id]);
        session(['carrito' => $carrito]);
        return redirect()->route('carrito.index');
    }

    // Vacía todo el carrito
    public function vaciar()
    {
        session()->forget('carrito');
        return redirect()->route('carrito.index');
    }

    // Muestra la página de pago (checkout)
    public function checkout()
    {
        $carrito = session('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('carrito.index');
        }

        return view('carrito.checkout', compact('carrito'));
    }

    // Confirma la compra, la GUARDA en la base de datos y vacía el carrito
    public function confirmar(Request $request)
    {
        $carrito = session('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('carrito.index');
        }

        // Calcula el total
        $total = 0;
        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        $metodo = $request->input('metodo_pago');

        // Registra la venta en la base de datos
        Venta::create([
            'user_id' => auth()->id(),
            'total' => $total,
            'metodo_pago' => $metodo,
            'productos' => $carrito,
        ]);

        // Vacía el carrito
        session()->forget('carrito');

        return view('carrito.confirmacion', compact('total', 'metodo'));
    }
}
