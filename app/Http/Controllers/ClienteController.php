<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Muestra la lista de clientes
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    // Muestra el formulario para crear un cliente
    public function create()
    {
        return view('clientes.create');
    }

    // Guarda el cliente nuevo en la base de datos
    public function store(Request $request)
    {
        Cliente::create($request->all());
        return redirect()->route('clientes.index');
    }

    // Muestra el formulario para editar un cliente
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    // Actualiza el cliente en la base de datos
    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('clientes.index');
    }

    // Elimina el cliente
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
