<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAprecioTransportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aprecio_transportes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('precio_id')->unsigned();
            $table->bigInteger('transporte_id')->unsigned();
            $table->string('name');
            $table->string('unidad');
            $table->double('tarifa', 10, 4);
            $table->double('cantidad', 10, 4);
            $table->double('distancia', 10, 4);
            $table->double('total', 10, 4);

            //relation
            $table->foreign('precio_id')->references('id')->on('precios')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('transporte_id')->references('id')->on('transportes')
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
        Schema::dropIfExists('aprecio_transportes');
    }
}
