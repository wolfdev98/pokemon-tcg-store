<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Productos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (auth()->user()->isAdmin())
                <div class="mb-6">
                    <a href="{{ route('productos.create') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md transition">
                        + Agregar Producto
                    </a>
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($productos as $producto)
                    <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition overflow-hidden flex flex-col">

                        {{-- Imagen --}}
                        <div class="h-48 bg-gray-50 flex items-center justify-center overflow-hidden">
                            @if ($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="h-full w-full object-contain p-2">
                            @else
                                <span class="text-gray-400 text-sm">Sin imagen</span>
                            @endif
                        </div>

                        {{-- Contenido --}}
                        <div class="p-4 flex flex-col flex-1">
                            <span class="text-xs font-medium text-blue-600 uppercase tracking-wide">{{ $producto->categoria }}</span>
                            <h3 class="mt-1 font-semibold text-gray-800 leading-snug">{{ $producto->nombre }}</h3>

                            <p class="mt-2 text-2xl font-bold text-gray-900">${{ number_format($producto->precio, 2) }}</p>

                            <p class="mt-1 text-sm {{ $producto->stock > 0 ? 'text-green-600' : 'text-red-500' }}">
                                {{ $producto->stock > 0 ? $producto->stock . ' disponibles' : 'Agotado' }}
                            </p>

                            @if (auth()->user()->isAdmin())
                                <div class="mt-4 flex gap-2 pt-3 border-t border-gray-100">
                                    <a href="{{ route('productos.edit', $producto) }}" class="flex-1 text-center bg-yellow-500 hover:bg-yellow-600 text-white text-sm px-3 py-2 rounded transition">Editar</a>
                                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="flex-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white text-sm px-3 py-2 rounded transition">Eliminar</button>
                                    </form>
                                </div>
                            @endif
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
