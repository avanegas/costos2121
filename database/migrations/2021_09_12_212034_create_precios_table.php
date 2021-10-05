<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('precios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();          
            $table->bigInteger('grupo_precio_id')->unsigned();
            $table->string('name')->unique();
            $table->string('unidad')->nullable();
            $table->string('detalle')->nullable();
            $table->double('directo', 10, 4);             
            $table->timestamps();

            //relation
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            //relation
            $table->foreign('grupo_precio_id')->references('id')->on('grupo_precios')
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
        Schema::dropIfExists('precios');
    }
}
