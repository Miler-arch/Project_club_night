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
        Schema::create('ventas_productos', function (Blueprint $table) {
            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('producto_id');
  
            $table->integer('cantidad');
  
            $table->foreign('venta_id')->references('id')->on('ventas');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->index(['venta_id', 'producto_id']);
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas_productos');
    }
};
