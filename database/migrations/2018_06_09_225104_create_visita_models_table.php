<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitaModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visita_models', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('postagem_model_id')->unsigned();
            $table->timestamps();
            $table->foreign('postagem_model_id')->references('id')->on('postagem_models')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visita_models');
    }
}
