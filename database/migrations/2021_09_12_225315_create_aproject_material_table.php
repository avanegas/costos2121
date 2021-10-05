<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAprojectMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aproject_material', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('project_id')->unsigned();            
            $table->bigInteger('material_id')->unsigned();
            $table->string('name')->unique();
            $table->string('unidad');
            $table->string('precio');
            $table->double('cantidad', 10, 4);

            //relation
            $table->foreign('project_id')->references('id')->on('projects')
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
        Schema::dropIfExists('aproject_material');
    }
}
