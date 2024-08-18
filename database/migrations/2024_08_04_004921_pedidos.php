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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('estado')->default("pending");
            $table->integer('total');
            $table->foreignId('id_mesa')->constrained('mesas');
            // $table->foreignId('id_cliente')->constrained('clientes');
            $table->foreignId('id_usuario')->constrained('users');
            $table->timestamps();
 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');

    }
};
