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
        Schema::create('metas', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->string('descripcion'); // Campo `descripcion`
            $table->unsignedBigInteger('encargado'); // Referencia a la tabla `users`
            $table->enum('estado', ['Pendiente', 'En proceso', 'Completada'])->default('Pendiente'); // Campo `estado`
            $table->timestamp('fecha_completada')->nullable(); // Campo opcional `fecha_completada`
            $table->timestamps(); // Campos `created_at` y `updated_at`

            // Clave foránea para `encargado`
            $table->foreign('encargado')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); // Elimina la meta si el usuario es eliminado
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metas');
    }
};
