<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->integer('quantity')->default(0);
            $table->decimal('costo', $precision = 12, $scale = 2);
            $table->decimal('precio', $precision = 12, $scale = 2);
            $table->decimal('costo_compania', $precision = 12, $scale = 2);
            $table->decimal('utilidad', $precision = 12, $scale = 2);
            $table->string('imagen');
            $table->enum('estado', ['HABILITADO', 'DESHABILITADO'])->default('HABILITADO');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
