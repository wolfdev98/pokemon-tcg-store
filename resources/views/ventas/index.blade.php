<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ventas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (count($ventas) > 0)
                <table class="w-full border bg-white rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gray-100 text-left">
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Fecha</th>
                            <th class="border px-4 py-2">Comprador</th>
                            <th class="border px-4 py-2">Productos</th>
                            <th class="border px-4 py-2">Método de pago</th>
                            <th class="border px-4 py-2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventas as $venta)
                        <tr>
                            <td class="border px-4 py-2">{{ $venta->id }}</td>
                            <td class="border px-4 py-2">{{ $venta->created_at->format('d/m/Y H:i') }}</td>
                            <td class="border px-4 py-2">{{ $venta->user?->name ?? 'Usuario eliminado' }}</td>
                            <td class="border px-4 py-2">
                                @foreach ($venta->productos as $producto)
                                    <div class="text-sm">{{ $producto['nombre'] }} (x{{ $producto['cantidad'] }})</div>
                                @endforeach
                            </td>
                            <td class="border px-4 py-2">{{ $venta->metodo_pago }}</td>
                            <td class="border px-4 py-2 font-semibold">${{ number_format($venta->total, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="bg-white rounded-lg shadow-sm p-8 text-center text-gray-500">
                    Aún no hay ventas registradas.
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
