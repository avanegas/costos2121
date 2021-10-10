<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAprecioEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aprecio_equipos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('precio_id')->unsigned();
            $table->bigInteger('equipo_id')->unsigned();
            $table->string('name');
            $table->string('tarifa');
            $table->double('cantidad', 10, 4);
            $table->double('rendimiento', 10, 4);
            $table->double('total', 10, 4);

            //relation
            $table->foreign('precio_id')->references('id')->on('precios')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('equipo_id')->references('id')->on('equipos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aprecio_equipos');
    }
}
