<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Clientes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('clientes.create') }}" style="background-color: #3b82f6; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none;">Agregar Cliente</a>
            <table class="mt-4 w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">Nombre</th>
                        <th class="border px-4 py-2">Apellido</th>
                        <th class="border px-4 py-2">Teléfono</th>
                        <th class="border px-4 py-2">Dirección</th>
                        <th class="border px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                    <tr>
                        <td class="border px-4 py-2">{{ $cliente->nombre }}</td>
                        <td class="border px-4 py-2">{{ $cliente->apellido }}</td>
                        <td class="border px-4 py-2">{{ $cliente->telefono }}</td>
                        <td class="border px-4 py-2">{{ $cliente->direccion }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('clientes.edit', $cliente) }}" style="background-color: #eab308; color: white; padding: 4px 8px; border-radius: 4px; text-decoration: none;">Editar</a>
                            <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background-color: #ef4444; color: white; padding: 4px 8px; border-radius: 4px; border: none; cursor: pointer;">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
