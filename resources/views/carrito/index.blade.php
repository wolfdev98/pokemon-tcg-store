<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mi Carrito
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            @if (count($carrito) > 0)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    @php $total = 0; @endphp
                    @foreach ($carrito as $id => $item)
                        @php $subtotal = $item['precio'] * $item['cantidad']; $total += $subtotal; @endphp
                        <div class="flex items-center gap-4 p-4 border-b border-gray-100">
                            <div class="h-16 w-16 bg-gray-50 flex items-center justify-center rounded overflow-hidden">
                                @if ($item['imagen'])
                                    <img src="{{ asset('storage/' . $item['imagen']) }}" alt="{{ $item['nombre'] }}" class="h-full w-full object-contain">
                                @endif
                            </div>
                            <div class="flex-1">
                                <p class="font-semibold text-gray-800">{{ $item['nombre'] }}</p>
                                <p class="text-sm text-gray-500">Cantidad: {{ $item['cantidad'] }} × ${{ number_format($item['precio'], 2) }}</p>
                            </div>
                            <p class="font-bold text-gray-900">${{ number_format($subtotal, 2) }}</p>
                            <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Quitar</button>
                            </form>
                        </div>
                    @endforeach

                    <div class="flex items-center justify-between p-4 bg-gray-50">
                        <span class="text-lg font-semibold text-gray-800">Total</span>
                        <span class="text-2xl font-extrabold text-slate-900">${{ number_format($total, 2) }}</span>
                    </div>
                </div>

                <div class="mt-4 flex flex-wrap justify-between items-center gap-3">
                    <a href="{{ route('productos.index') }}" class="text-blue-600 hover:underline">← Seguir comprando</a>
                    <div class="flex gap-3">
                        <form action="{{ route('carrito.vaciar') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">Vaciar carrito</button>
                        </form>
                        <a href="{{ route('checkout') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Finalizar compra</a>
                    </div>
                </div>
            @else
                <div class="bg-white rounded-lg shadow-sm p-8 text-center">
                    <p class="text-gray-500 mb-4">Tu carrito está vacío.</p>
                    <a href="{{ route('productos.index') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg">Ver productos</a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
