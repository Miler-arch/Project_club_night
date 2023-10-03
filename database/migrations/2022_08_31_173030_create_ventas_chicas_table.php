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
        Schema::create('ventas_chicas', function (Blueprint $table) {
            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('chica_id');
  
            $table->foreign('venta_id')->references('id')->on('ventas');
            $table->foreign('chica_id')->references('id')->on('chicas');
            $table->index(['venta_id', 'chica_id']);
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas_chicas');
    }
};
