<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('conteudo');
            $table->datetime('publish_date');
            $table->integer('comentario_model_id')->unsigned();
            $table->integer('user_model_id')->unsigned();
            $table->timestamps();
            $table->foreign('comentario_model_id')->references('id')->on('comentario_models')->onDelete('CASCADE');
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
        Schema::dropIfExists('reply_models');
    }
}
