<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agregar Cliente
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block">Nombre</label>
                    <input type="text" name="nombre" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Apellido</label>
                    <input type="text" name="apellido" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Teléfono</label>
                    <input type="text" name="telefono" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Dirección</label>
                    <input type="text" name="direccion" class="border w-full px-3 py-2 rounded">
                </div>
                <button type="submit" style="background-color: #3b82f6; color: white; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer;">Guardar</button>
                <a href="{{ route('clientes.index') }}" class="ml-2">Cancelar</a>
            </form>
        </div>
    </div>
</x-app-layout>
