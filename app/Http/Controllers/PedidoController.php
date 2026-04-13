<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // Muestra la lista de pedidos
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }

    // Muestra el formulario para crear un pedido
    public function create()
    {
        return view('pedidos.create');
    }

    // Guarda el pedido nuevo en la base de datos
    public function store(Request $request)
    {
        Pedido::create($request->all());
        return redirect()->route('pedidos.index');
    }

    // Muestra el formulario para editar un pedido
    public function edit(Pedido $pedido)
    {
        return view('pedidos.edit', compact('pedido'));
    }

    // Actualiza el pedido en la base de datos
    public function update(Request $request, Pedido $pedido)
    {
        $pedido->update($request->all());
        return redirect()->route('pedidos.index');
    }

    // Elimina el pedido
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index');
    }
}
