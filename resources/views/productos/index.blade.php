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
                    <a href="{{ route('productos.create') }}" class="inline-flex items-center gap-2 bg-slate-800 hover:bg-slate-900 text-white px-5 py-2.5 rounded-xl font-medium shadow-sm transition">
                        <span class="text-lg leading-none">+</span> Agregar Producto
                    </a>
                </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($productos as $producto)
                    <div class="group relative bg-white rounded-2xl border border-gray-200 overflow-hidden flex flex-col transition duration-200 hover:-translate-y-1 hover:shadow-xl">

                        {{-- Imagen --}}
                        <div class="relative h-52 bg-gradient-to-br from-slate-50 to-gray-100 flex items-center justify-center p-4 overflow-hidden">
                            <span class="absolute top-3 left-3 z-10 bg-amber-400 text-slate-900 text-xs font-bold px-2.5 py-1 rounded-full shadow-sm">
                                {{ $producto->categoria }}
                            </span>
                            @if ($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="h-full w-full object-contain transition duration-200 group-hover:scale-105">
                            @else
                                <span class="text-gray-400 text-sm">Sin imagen</span>
                            @endif
                        </div>

                        {{-- Contenido --}}
                        <div class="p-5 flex flex-col flex-1">
                            <h3 class="font-bold text-gray-900 leading-snug">{{ $producto->nombre }}</h3>

                            <div class="mt-auto pt-4 flex items-end justify-between">
                                <p class="text-2xl font-extrabold text-slate-900">
                                    ${{ number_format($producto->precio, 2) }}
                                </p>
                                <span class="text-xs font-semibold px-2.5 py-1 rounded-full {{ $producto->stock > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-600' }}">
                                    {{ $producto->stock > 0 ? $producto->stock . ' en stock' : 'Agotado' }}
                                </span>
                            </div>

                            @if (auth()->user()->isAdmin())
                                <div class="mt-4 flex gap-2 pt-4 border-t border-gray-100">
                                    <a href="{{ route('productos.edit', $producto) }}" class="flex-1 text-center bg-amber-400 hover:bg-amber-500 text-slate-900 text-sm font-medium px-3 py-2 rounded-lg transition">Editar</a>
                                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="flex-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white text-sm font-medium px-3 py-2 rounded-lg transition">Eliminar</button>
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
