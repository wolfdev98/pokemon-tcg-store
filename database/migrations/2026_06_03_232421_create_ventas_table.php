<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // quién compró
            $table->decimal('total', 10, 2);   // total de la compra
            $table->string('metodo_pago');      // tarjeta, paypal, etc.
            $table->json('productos');          // los productos comprados
            $table->timestamps();               // fecha de la compra
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
