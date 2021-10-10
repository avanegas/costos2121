<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAprecioMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aprecio_materials', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('precio_id')->unsigned();
            $table->bigInteger('material_id')->unsigned();
            $table->string('name');
            $table->string('unidad');
            $table->double('precio', 10, 4);
            $table->double('cantidad', 10, 4);
            $table->double('total', 10, 4);

            //relation
            $table->foreign('precio_id')->references('id')->on('precios')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('material_id')->references('id')->on('materials')
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
        Schema::dropIfExists('aprecio_materials');
    }
}
