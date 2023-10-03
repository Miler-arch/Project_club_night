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
        Schema::create('chicas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('health_card_expiry_date')->nullable();
            $table->string('code_card')->unique()->nullable();
            $table->string('ci')->unique();
            $table->string('phone')->unique();
            $table->integer('age');
            $table->string('image');
            $table->enum('state', ['PENDIENTE', 'CANCELADO'])->default('PENDIENTE');
            $table->tinyInteger('state_chica')->default(1)->comment("0 : 'Inactivo', 1 : 'Activo', 2 :'Bloqueado'");
            $table->timestamps();

            // {{-- state 0 = inactivo 1 = activo 3 = bloqueado--}}
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chicas');
    }
};
