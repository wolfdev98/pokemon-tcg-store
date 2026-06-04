<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Quitamos las columnas de texto viejas
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropColumn(['cliente', 'producto']);
        });

        // Agregamos las conexiones reales (llaves foráneas)
        Schema::table('pedidos', function (Blueprint $table) {
            $table->foreignId('cliente_id')->nullable()->after('id')->constrained('clientes')->onDelete('cascade');
            $table->foreignId('producto_id')->nullable()->after('cliente_id')->constrained('productos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('pedidos', function (Blueprint $table) {
            $table->dropForeign(['cliente_id']);
            $table->dropForeign(['producto_id']);
            $table->dropColumn(['cliente_id', 'producto_id']);
        });

        Schema::table('pedidos', function (Blueprint $table) {
            $table->string('cliente');
            $table->string('producto');
        });
    }
};
