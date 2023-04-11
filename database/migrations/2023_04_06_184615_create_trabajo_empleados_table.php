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
        Schema::create('trabajo_empleados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            //FORMA NUEVA - Trabajo
            $table->foreignId('trabajo_id')
                  ->nullable()
                  ->constrained('trabajos')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();

            //FORMA NUEVA - Empleado
            $table->foreignId('empleado_id')
                  ->nullable()
                  ->constrained('empleados')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajo_empleados');
    }
};
