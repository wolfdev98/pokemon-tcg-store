<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agregar Pedido
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('pedidos.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block">Cliente</label>
                    <input type="text" name="cliente" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Producto</label>
                    <input type="text" name="producto" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Cantidad</label>
                    <input type="number" name="cantidad" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Estado</label>
                    <select name="estado" class="border w-full px-3 py-2 rounded">
                        <option value="pendiente">Pendiente</option>
                        <option value="enviado">Enviado</option>
                        <option value="entregado">Entregado</option>
                    </select>
                </div>
                <button type="submit" style="background-color: #3b82f6; color: white; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer;">Guardar</button>
                <a href="{{ route('pedidos.index') }}" class="ml-2">Cancelar</a>
            </form>
        </div>
    </div>
</x-app-layout>
