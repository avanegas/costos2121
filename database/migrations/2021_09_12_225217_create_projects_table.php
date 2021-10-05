<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('name');
            $table->string('contratante');
            $table->string('ubicacion');
            $table->string('oferente');
            $table->date('entrega');
            $table->double('referencial', 10, 4);
            $table->double('indirecto', 10, 4);
            $table->double('impuesto', 10, 4);
            $table->double('distancia', 10, 4);
            $table->double('sub_total', 10, 4);
            $table->double('gran_total', 10, 4);
            $table->string('formato');
            $table->bigInteger('precision')->unsigned();
            $table->string('representante');
            $table->timestamps();

            //relation
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('projects');
    }
}
