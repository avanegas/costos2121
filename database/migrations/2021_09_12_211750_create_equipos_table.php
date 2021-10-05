<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('grupo_equipo_id')->unsigned();
            $table->string('name')->unique();
            $table->string('marca')->nullable();
            $table->string('tipo')->nullable();
            $table->double('tarifa',10,4);            
            $table->timestamps();

            //relation
            $table->foreign('grupo_equipo_id')->references('id')->on('grupo_equipos')
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
        Schema::dropIfExists('equipos');
    }
}
