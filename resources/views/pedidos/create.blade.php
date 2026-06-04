<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agregar Pedido
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('pedidos.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block">Cliente</label>
                    <select name="cliente_id" class="border w-full px-3 py-2 rounded">
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->nombre }} {{ $cliente->apellido }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block">Producto</label>
                    <select name="producto_id" class="border w-full px-3 py-2 rounded">
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block">Cantidad</label>
                    <input type="number" name="cantidad" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Estado</label>
                    <select name="estado" class="border w-full px-3 py-2 rounded">
                        <option value="pendiente">Pendiente</option>
                        <option value="enviado">Enviado</option>
                        <option value="entregado">Entregado</option>
                    </select>
                </div>
                <button type="submit" style="background-color: #3b82f6; color: white; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer;">Guardar</button>
                <a href="{{ route('pedidos.index') }}" class="ml-2">Cancelar</a>
            </form>
        </div>
    </div>
</x-app-layout>
