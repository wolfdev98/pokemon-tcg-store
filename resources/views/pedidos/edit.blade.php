<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Pedido
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('pedidos.update', $pedido) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label class="block">Cliente</label>
                    <input type="text" name="cliente" value="{{ $pedido->cliente }}" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Producto</label>
                    <input type="text" name="producto" value="{{ $pedido->producto }}" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Cantidad</label>
                    <input type="number" name="cantidad" value="{{ $pedido->cantidad }}" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Estado</label>
                    <select name="estado" class="border w-full px-3 py-2 rounded">
                        <option value="pendiente" {{ $pedido->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="enviado" {{ $pedido->estado == 'enviado' ? 'selected' : '' }}>Enviado</option>
                        <option value="entregado" {{ $pedido->estado == 'entregado' ? 'selected' : '' }}>Entregado</option>
                    </select>
                </div>
                <button type="submit" style="background-color: #eab308; color: white; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer;">Actualizar</button>
                <a href="{{ route('pedidos.index') }}" class="ml-2">Cancelar</a>
            </form>
        </div>
    </div>
</x-app-layout>
