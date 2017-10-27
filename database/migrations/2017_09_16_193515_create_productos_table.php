<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('productos', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre');
          $table->integer('idCategoria')->unsigned()->index();
          $table->foreign('idCategoria')->references('id')->on('categorias')->onDelete('cascade');
          $table->integer('idMarca')->unsigned()->index();
          $table->foreign('idMarca')->references('id')->on('marca')->onDelete('cascade');
          $table->string('descripcion');
          $table->string('imagen');
          $table->integer('precio');
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
        Schema::dropIfExists('productos');
    }
}
