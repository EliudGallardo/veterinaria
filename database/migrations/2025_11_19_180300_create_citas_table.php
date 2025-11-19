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
        Schema::create('citas', function (Blueprint $table) {
        $table->id();

        $table->string('cliente');      // Nombre del cliente
        $table->string('mascota');      // Nombre de la mascota
        $table->string('telefono');     // Número telefónico
        $table->dateTime('fecha_hora'); // Fecha y hora de la cita
        $table->text('motivo');         // Motivo de la cita

        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
