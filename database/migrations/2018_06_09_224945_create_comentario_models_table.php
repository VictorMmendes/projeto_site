<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentarioModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('conteudo');
            $table->datetime('publish_date');
            $table->integer('postagem_model_id')->unsigned();
            $table->integer('user_model_id')->unsigned();
            $table->timestamps();
            $table->foreign('postagem_model_id')->references('id')->on('postagem_models')->onDelete('CASCADE');
            $table->foreign('user_model_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentario_models');
    }
}
