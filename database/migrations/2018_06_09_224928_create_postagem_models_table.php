<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostagemModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postagem_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('img1');
            $table->string('img2');
            $table->string('txt1');
            $table->string('txt2');
            $table->string('produto_rel_url');
            $table->datetime('publish_date');
            $table->string('genero');
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
        Schema::dropIfExists('postagem_models');
    }
}
