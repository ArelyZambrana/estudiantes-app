<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('historial_estudiantes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_id'); // Qué estudiante cambió
            $table->string('campo');                     // Qué campo cambió (ej: nombre)
            $table->text('valor_anterior')->nullable();  // Valor antes del cambio
            $table->text('valor_nuevo')->nullable();     // Valor después del cambio
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('historial_estudiantes');
    }
};