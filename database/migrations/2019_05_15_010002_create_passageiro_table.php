<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePassageiroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passageiro', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('id_passageiro');
            $table->integer('id_viagem');
            $table->foreign('id_viagem')->references('id')->on('viagem')->onDelete('cascade');
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
        Schema::dropIfExists('passageiro');
    }
}
