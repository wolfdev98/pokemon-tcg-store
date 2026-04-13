<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agregar Producto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('productos.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block">Nombre</label>
                    <input type="text" name="nombre" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Descripción</label>
                    <textarea name="descripcion" class="border w-full px-3 py-2 rounded"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block">Precio</label>
                    <input type="number" step="0.01" name="precio" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Stock</label>
                    <input type="number" name="stock" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Categoría</label>
                    <select name="categoria" class="border w-full px-3 py-2 rounded">
                        <option value="ETB">ETB</option>
                        <option value="Bundle">Bundle</option>
                        <option value="Booster">Booster</option>
                        <option value="Accesorio">Accesorio</option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Guardar</button>
                <a href="{{ route('productos.index') }}" class="ml-2">Cancelar</a>
            </form>
        </div>
    </div>
</x-app-layout>
