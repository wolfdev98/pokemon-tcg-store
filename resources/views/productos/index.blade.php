<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Productos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('productos.create') }}" style="background-color: #3b82f6; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none;">Agregar Producto</a>
            <table class="mt-4 w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">ID</th> <th class="border px-4 py-2">Nombre</th>
                        <th class="border px-4 py-2">Categoría</th>
                        <th class="border px-4 py-2">Precio</th>
                        <th class="border px-4 py-2">Stock</th>
                        <th class="border px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td class="border px-4 py-2">{{ $producto->id }}</td> <td class="border px-4 py-2">{{ $producto->nombre }}</td>
                        <td class="border px-4 py-2">{{ $producto->categoria }}</td>
                        <td class="border px-4 py-2">${{ $producto->precio }}</td>
                        <td class="border px-4 py-2">{{ $producto->stock }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('productos.edit', $producto) }}" style="background-color: #eab308; color: white; padding: 4px 8px; border-radius: 4px; text-decoration: none;">Editar</a>
                            <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="inline">
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
