<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAprojectObrerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aproject_obreros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id')->unsigned();
            $table->bigInteger('obrero_id')->unsigned();
            $table->string('name')->unique();
            $table->string('jornalhora');
            $table->double('cantidad', 10, 4);
            $table->string('factor');

            //relation
            $table->foreign('project_id')->references('id')->on('projects')
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
        Schema::dropIfExists('aproject_obreros');
    }
}
