<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lineas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->float('subtotal', 10, 2);
            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->integer('requisicion_id')->unsigned();
            $table->foreign('requisicion_id')->references('id')->on('requisiciones')->onDelete('cascade');
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
        Schema::dropIfExists('lineas');
    }
}
