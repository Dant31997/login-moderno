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
        Schema::create('peticiones', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCompleto'); // Nombre completo del cliente
            $table->string('numeroCuenta'); // Número de cuenta del cliente
            $table->string('correo'); // Correo electrónico del cliente
            $table->string('telefono'); // Teléfono del cliente
            $table->enum('tipoPeticion', ['Peticion', 'Queja', 'Reclamo'])->default('Peticion'); // Tipo de petición
            $table->string('asunto', 1000)->nullable(); // Asunto, puede ser nulo
            $table->text('descripcion')->nullable(); // Descripción de la petición, puede ser nula
            $table->string('preferenciaContacto')->nullable(); // Preferencia de contacto
            $table->boolean('consentimiento')->default(false); // Consentimiento de contacto
            $table->string('estado')->default('Pendiente'); // Estado de la petición
            
            // Modificar el campo responsable para que sea un ID de empleado
            $table->unsignedBigInteger('responsable')->nullable(); // Cambiar a unsignedBigInteger para ID
            $table->foreign('responsable')->references('id')->on('users')->onDelete('set null'); // Relación con la tabla users

            $table->timestamps(); // Timestamps: created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peticiones');
    }
};
