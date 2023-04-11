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
            $table->integer('numero');
            $table->dateTime('fecha', $precision = 0);
            $table->string('descripcion');
            $table->timestamps();
            $table->softDeletes();

            //relacion a 1 con Supervisor - CLAVE FORANEA - FORMA VIEJA
            //$table->foreign('supervisor_id')->references('id')->on('supervisors');

            //relacion a 1 con Estado - CLAVE FORANEA - FORMA VIEJA
            //$table->foreign('estado_id')->references('id')->on('estados');

            //FORMA NUEVA con supervisor
            $table->foreignId('supervisor_id')
                  ->nullable()
                  ->constrained('supervisors')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();


            //FORMA NUEVA con Estado
            $table->foreignId('estado_id')
                  ->nullable()
                  ->constrained('estados')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
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
