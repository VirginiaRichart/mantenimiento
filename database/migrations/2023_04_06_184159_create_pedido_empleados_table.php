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
        Schema::create('pedido_empleados', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

             //FORMA NUEVA - Pedido
            $table->foreignId('pedido_id')
                  ->nullable()
                  ->constrained('pedidos')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();

            //FORMA NUEVA - Epleado
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
        Schema::dropIfExists('pedido_empleados');
    }
};
