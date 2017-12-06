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
            $table->integer('almacen_id')->unsigned();
            $table->foreign('almacen_id')->references('id')->on('almacenes');
            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->integer('tonalidad')->unsigned();
            $table->integer('olor')->unsigned();
            $table->integer('textura')->unsigned();
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
