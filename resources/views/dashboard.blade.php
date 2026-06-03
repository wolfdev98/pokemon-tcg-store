<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Bienvenida --}}
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-bold text-gray-800">
                    ¡Hola, {{ Auth::user()->name }}! 👋
                </h3>
                <p class="text-gray-600 mt-1">
                    Bienvenido a tu tienda de cartas Pokémon.
                </p>
            </div>

            @if (auth()->user()->isAdmin())
                {{-- Tarjetas con totales (solo admin) --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

                    <a href="{{ route('productos.index') }}" class="block bg-white shadow-sm sm:rounded-lg p-6 hover:shadow-md transition border-l-4 border-blue-500">
                        <p class="text-sm font-medium text-gray-500">Productos</p>
                        <p class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\Producto::count() }}</p>
                        <p class="text-sm text-blue-500 mt-2">Ver productos →</p>
                    </a>

                    <a href="{{ route('clientes.index') }}" class="block bg-white shadow-sm sm:rounded-lg p-6 hover:shadow-md transition border-l-4 border-green-500">
                        <p class="text-sm font-medium text-gray-500">Clientes</p>
                        <p class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\Cliente::count() }}</p>
                        <p class="text-sm text-green-600 mt-2">Ver clientes →</p>
                    </a>

                    <a href="{{ route('pedidos.index') }}" class="block bg-white shadow-sm sm:rounded-lg p-6 hover:shadow-md transition border-l-4 border-yellow-400">
                        <p class="text-sm font-medium text-gray-500">Pedidos</p>
                        <p class="text-3xl font-bold text-gray-800 mt-2">{{ \App\Models\Pedido::count() }}</p>
                        <p class="text-sm text-yellow-600 mt-2">Ver pedidos →</p>
                    </a>

                </div>

                {{-- Acciones rápidas --}}
                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <h4 class="font-semibold text-gray-800 mb-4">Acciones rápidas</h4>
                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('productos.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition">+ Agregar producto</a>
                        <a href="{{ route('clientes.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">+ Agregar cliente</a>
                        <a href="{{ route('pedidos.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded transition">+ Agregar pedido</a>
                    </div>
                </div>
            @else
                {{-- Vista para usuario normal --}}
                <div class="bg-white shadow-sm sm:rounded-lg p-6 text-center">
                    <p class="text-gray-700 mb-4">Explora nuestro catálogo de cartas y productos Pokémon.</p>
                    <a href="{{ route('productos.index') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg transition">
                        Ver productos
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
