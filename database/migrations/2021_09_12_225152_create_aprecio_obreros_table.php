<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAprecioObrerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aprecio_obreros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('precio_id')->unsigned();
            $table->bigInteger('obrero_id')->unsigned();
            $table->string('name');
            $table->double('jornalhora', 10, 4);
            $table->double('cantidad', 10, 4);
            $table->double('rendimiento', 10, 4);
            $table->double('total', 10, 4);

            //relation
            $table->foreign('precio_id')->references('id')->on('precios')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('obrero_id')->references('id')->on('obreros')
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
        Schema::dropIfExists('aprecio_obreros');
    }
}
