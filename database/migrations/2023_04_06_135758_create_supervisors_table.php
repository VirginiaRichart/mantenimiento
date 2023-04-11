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
        Schema::create('supervisors', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo')->unique();
            $table->string('telefono');
            $table->string('cuit')->unique();
            $table->timestamps();
            $table->softDeletes();

            //relacion a 1 con Area - CLAVE FORANEA - FORMA VIEJA
            //$table->foreign('area_id')->references('id')->on('areas');

            //FORMA NUEVA
            $table->foreignId('area_id')
                  ->nullable()
                  ->constrained('areas')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supervisors');
    }
};
