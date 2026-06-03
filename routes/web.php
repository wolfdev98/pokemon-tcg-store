    <?php

    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\ProductoController;
    use App\Http\Controllers\ClienteController;
    use App\Http\Controllers\PedidoController;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

require __DIR__.'/auth.php';

// Cualquier usuario logueado puede VER la lista de productos
Route::get('/productos', [ProductoController::class, 'index'])
    ->middleware('auth')
    ->name('productos.index');

// Solo el ADMIN puede crear/editar/borrar productos y manejar clientes y pedidos
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('productos', ProductoController::class)->except(['index', 'show']);
    Route::resource('clientes', ClienteController::class);
    Route::resource('pedidos', PedidoController::class);
});
