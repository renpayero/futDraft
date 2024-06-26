<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();

            $table->integer('cantidad');
            $table->decimal('precio_unitario', 8, 2);
            //el subtotal es la suma de la cantidad por el precio unitario
            $table->decimal('subtotal', 8, 2)->default(0); //se calcula en el frontend
            $table->decimal('descuento', 8, 2)->default(0); //se calcula en el frontend

            $table->foreignId('venta_id')->constrained('ventas')->onDelete('cascade');
            //se relaciona con producto id
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
