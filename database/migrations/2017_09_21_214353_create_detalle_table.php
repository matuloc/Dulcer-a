<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_orders')->unsigned()->index();
            $table->foreign('id_orders')->references('id')->on('orders')->onDelete('cascade');
            $table->integer('id_producto')->unsigned()->index();
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            $table->integer('cantidad');
            $table->float('total');
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
        Schema::dropIfExists('detalle');
    }
}
