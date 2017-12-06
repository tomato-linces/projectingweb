<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequisicionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisiciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('region');
            $table->integer('direccion_id')->unsigned();
            $table->foreign('direccion_id')->references('id')->on('direcciones')->onDelete('cascade');
            $table->float('total', 10, 2);
            $table->integer('estado');
            $table->boolean('urgente');
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
        Schema::dropIfExists('requisiciones');
    }
}
