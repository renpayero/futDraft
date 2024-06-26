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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre', 100);
            $table->string('descripcion', 255)->nullable()->default(null);
            $table->decimal('precio', 8, 2);
            $table->integer('stock')->unsigned()->default(0);
            $table->string('imagen', 255)->nullable()->default(null);
            $table->boolean('estado')->default(1); // 0 = Inactivo, 1 = Activo



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
