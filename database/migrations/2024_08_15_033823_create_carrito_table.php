<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('carritos', function (Blueprint $table) {
            $table->id(); // Llave primaria, con autoincremento
            $table->foreignId('mesa_id')->constrained('mesas')->onDelete('cascade'); // Relación con la mesa
            $table->foreignId('usuario_id')->constrained('users')->onDelete('cascade'); 
            $table->foreignId('producto_id')->constrained('productos')->onDelete('cascade'); // Relación con la tabla productos
            $table->decimal('precio', 10, 2); // Columna para el precio del producto
            $table->integer('cantidad'); // Columna para la cantidad del producto
            $table->string('nota')->nullable(); // Columna para la descripción del producto, nullable
            $table->timestamps(); // Añade las columnas created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito');
    }
}
