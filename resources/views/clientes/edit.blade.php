<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Cliente
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('clientes.update', $cliente) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label class="block">Nombre</label>
                    <input type="text" name="nombre" value="{{ $cliente->nombre }}" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Apellido</label>
                    <input type="text" name="apellido" value="{{ $cliente->apellido }}" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Teléfono</label>
                    <input type="text" name="telefono" value="{{ $cliente->telefono }}" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Dirección</label>
                    <input type="text" name="direccion" value="{{ $cliente->direccion }}" class="border w-full px-3 py-2 rounded">
                </div>
                <button type="submit" style="background-color: #eab308; color: white; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer;">Actualizar</button>
                <a href="{{ route('clientes.index') }}" class="ml-2">Cancelar</a>
            </form>
        </div>
    </div>
</x-app-layout>
