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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');
            $table->boolean('estado'); // 0 = Anulado, 1 = Activo
            $table->decimal('total', 10, 2, true);
            $table->string('numero_venta', 255);
            
            $table->foreignId('cliente_id')->nullable()->constrained('clientes')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
