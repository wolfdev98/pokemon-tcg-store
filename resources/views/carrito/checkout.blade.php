<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Finalizar compra
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            @php $total = 0; @endphp

            <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                <h3 class="font-semibold text-gray-800 mb-4">Resumen del pedido</h3>
                @foreach ($carrito as $item)
                    @php $subtotal = $item['precio'] * $item['cantidad']; $total += $subtotal; @endphp
                    <div class="flex justify-between text-sm py-2 border-b border-gray-100">
                        <span class="text-gray-700">{{ $item['nombre'] }} (x{{ $item['cantidad'] }})</span>
                        <span class="font-medium text-gray-900">${{ number_format($subtotal, 2) }}</span>
                    </div>
                @endforeach
                <div class="flex justify-between pt-4 text-lg font-bold">
                    <span>Total</span>
                    <span class="text-slate-900">${{ number_format($total, 2) }}</span>
                </div>
            </div>

            <form action="{{ route('checkout.confirmar') }}" method="POST" class="bg-white rounded-lg shadow-sm p-6">
                @csrf
                <h3 class="font-semibold text-gray-800 mb-4">Método de pago</h3>

                <div class="space-y-3">
                    <label class="flex items-center gap-3 border border-gray-200 rounded-lg p-3 cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="metodo_pago" value="Tarjeta de crédito/débito" checked>
                        <span>Tarjeta de crédito / débito</span>
                    </label>
                    <label class="flex items-center gap-3 border border-gray-200 rounded-lg p-3 cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="metodo_pago" value="PayPal">
                        <span>PayPal</span>
                    </label>
                    <label class="flex items-center gap-3 border border-gray-200 rounded-lg p-3 cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="metodo_pago" value="Transferencia bancaria">
                        <span>Transferencia bancaria</span>
                    </label>
                    <label class="flex items-center gap-3 border border-gray-200 rounded-lg p-3 cursor-pointer hover:bg-gray-50">
                        <input type="radio" name="metodo_pago" value="Efectivo (contra entrega)">
                        <span>Efectivo (contra entrega)</span>
                    </label>
                </div>

                <button type="submit" class="mt-6 w-full bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-3 rounded-lg transition">
                    Confirmar pedido
                </button>
                <a href="{{ route('carrito.index') }}" class="block text-center mt-3 text-blue-600 hover:underline text-sm">← Volver al carrito</a>
            </form>

        </div>
    </div>
</x-app-layout>
