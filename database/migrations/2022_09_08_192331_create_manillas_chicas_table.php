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
        Schema::create('manillas_chicas', function (Blueprint $table) {
            $table->unsignedBigInteger('manilla_id');
            $table->unsignedBigInteger('chica_id');
            $table->integer('cantidad');
            $table->integer('monto');
            $table->timestamps();

            $table->foreign('manilla_id')->references('id')->on('manillas');
            $table->foreign('chica_id')->references('id')->on('chicas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manillas_chicas');
    }
};
