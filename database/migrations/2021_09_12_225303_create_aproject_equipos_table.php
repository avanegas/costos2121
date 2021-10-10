<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAprojectEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aproject_equipos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id')->unsigned();           
            $table->bigInteger('equipo_id')->unsigned();
            $table->string('name')->unique();
            $table->string('marca')->nullable();
            $table->string('tipo')->nullable();
            $table->double('cantidad', 10, 4);
            $table->double('tarifa', 10, 4);            

            //relation
            $table->foreign('project_id')->references('id')->on('projects')
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
        Schema::dropIfExists('aproject_equipos');
    }
}
