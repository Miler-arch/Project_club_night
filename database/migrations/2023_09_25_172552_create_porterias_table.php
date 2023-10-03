<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('porterias', function (Blueprint $table) {
            $table->id();
            $table->enum('type_entry', ['ENTRADA', 'SALIDA']);
            $table->string('reason')->nullable();
            $table->string('reason_txt')->nullable();

            $table->unsignedBigInteger('chica_id')->nullable();
            $table->foreign('chica_id')->references('id')->on('chicas');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger("client_id")->nullable();
            $table->foreign("client_id")->references("id")->on("clients");
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('porterias');
    }
};
