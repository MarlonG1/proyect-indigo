<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventario', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prestamo_id')->nullable()->constrained()->onDelete('set null');
            $table->string('marca')->nullable();
            $table->string('tipo')->nullable();
            $table->string('modelo');
            $table->string('identificador');
            $table->string('estado')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('imagen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario');
    }
};