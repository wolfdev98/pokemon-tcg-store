<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        // Cambia la cantidad de un producto del carrito
    public function actualizar(Request $request, $id)
    {
        $carrito = session('carrito', []);

        if (! isset($carrito[$id])) {
            return redirect()->route('carrito.index');
        }

        $cantidad = (int) $request->input('cantidad');

        if ($cantidad < 1) {
            unset($carrito[$id]);
        } else {
            $producto = Producto::find($id);

            if ($producto && $cantidad > $producto->stock) {
                return redirect()->route('carrito.index')
                    ->with('error', "Solo hay {$producto->stock} unidades disponibles de {$producto->nombre}.");
            }

            $carrito[$id]['cantidad'] = $cantidad;
        }

        session(['carrito' => $carrito]);
        return redirect()->route('carrito.index');
    }

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

    // Confirma la compra: valida existencias, descuenta stock y guarda la venta
    public function confirmar(Request $request)
    {
        $carrito = session('carrito', []);

        if (empty($carrito)) {
            return redirect()->route('carrito.index');
        }

        $metodo = $request->input('metodo_pago');

        try {
            // Todo o nada: si algo falla, no se descuenta ni se guarda nada
            $venta = DB::transaction(function () use ($carrito, $metodo) {
                $total = 0;

                foreach ($carrito as $id => $item) {
                    $producto = Producto::lockForUpdate()->find($id);

                    if (! $producto) {
                        throw new \Exception("El producto {$item['nombre']} ya no existe.");
                    }

                    if ($item['cantidad'] > $producto->stock) {
                        throw new \Exception(
                            "No hay suficientes existencias de {$producto->nombre}. Disponibles: {$producto->stock}."
                        );
                    }

                    $producto->decrement('stock', $item['cantidad']);
                    $total += $producto->precio * $item['cantidad'];
                }

                return Venta::create([
                    'user_id' => auth()->id(),
                    'total' => $total,
                    'metodo_pago' => $metodo,
                    'productos' => $carrito,
                ]);
            });
        } catch (\Exception $e) {
            return redirect()->route('carrito.index')->with('error', $e->getMessage());
        }

        session()->forget('carrito');
        $total = $venta->total;

        return view('carrito.confirmacion', compact('total', 'metodo', 'venta'));
    }
}
