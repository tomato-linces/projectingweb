<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCajasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cajas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->date('fecha_caducidad');
            $table->integer('bodega_id')->unsigned();
            $table->foreign('bodega_id')->references('id')->on('bodegas');
            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->integer('bodega_pertenece_id')->unsigned();
            $table->foreign('bodega_pertenece_id')->references('id')->on('bodegas');
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

        Schema::dropIfExists('cajas');
    }
}
