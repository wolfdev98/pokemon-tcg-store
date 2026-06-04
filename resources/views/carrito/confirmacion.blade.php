<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Compra confirmada
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm p-8 text-center">
                <div class="text-5xl mb-4">✅</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">¡Gracias por tu compra!</h3>
                <p class="text-gray-600 mb-6">Tu pedido fue registrado correctamente.</p>

                <div class="bg-gray-50 rounded-lg p-4 text-left text-sm mb-6">
                    <div class="flex justify-between py-1">
                        <span class="text-gray-500">Método de pago</span>
                        <span class="font-medium text-gray-800">{{ $metodo }}</span>
                    </div>
                    <div class="flex justify-between py-1">
                        <span class="text-gray-500">Total pagado</span>
                        <span class="font-bold text-slate-900">${{ number_format($total, 2) }}</span>
                    </div>
                </div>

                <a href="{{ route('productos.index') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg">Seguir comprando</a>
            </div>
        </div>
    </div>
</x-app-layout>
