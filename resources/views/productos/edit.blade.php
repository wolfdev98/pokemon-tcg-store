<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Producto
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('productos.update', $producto) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label class="block">Nombre</label>
                    <input type="text" name="nombre" value="{{ $producto->nombre }}" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Descripción</label>
                    <textarea name="descripcion" class="border w-full px-3 py-2 rounded">{{ $producto->descripcion }}</textarea>
                </div>
                <div class="mb-4">
                    <label class="block">Precio</label>
                    <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Stock</label>
                    <input type="number" name="stock" value="{{ $producto->stock }}" class="border w-full px-3 py-2 rounded">
                </div>
                <div class="mb-4">
                    <label class="block">Categoría</label>
                    <select name="categoria" class="border w-full px-3 py-2 rounded">
                        <option value="Accesorios" {{ $producto->categoria == 'Accesorios' ? 'selected' : '' }}>Accesorios</option>
                        <option value="Producto Sellado" {{ $producto->categoria == 'Producto Sellado' ? 'selected' : '' }}>Producto Sellado</option>
                        <option value="Cartas" {{ $producto->categoria == 'Cartas' ? 'selected' : '' }}>Cartas</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block">Imagen actual</label>
                    @if ($producto->imagen)
                        <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="h-24 w-24 object-cover rounded mb-2">
                    @else
                        <p class="text-gray-400 text-sm mb-2">Este producto no tiene imagen.</p>
                    @endif
                    <label class="block">Cambiar imagen (opcional)</label>
                    <input type="file" name="imagen" accept="image/*" class="border w-full px-3 py-2 rounded">
                </div>
                <button type="submit" style="background-color: #eab308; color: white; padding: 8px 16px; border-radius: 6px; border: none; cursor: pointer;">Actualizar</button>
                <a href="{{ route('productos.index') }}" class="ml-2">Cancelar</a>
            </form>
        </div>
    </div>
</x-app-layout>
