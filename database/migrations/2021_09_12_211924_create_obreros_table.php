<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObrerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obreros', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('grupo_obrero_id')->unsigned();
            $table->string('name')->unique();
            $table->string('jornalhora');
            $table->string('factor');            
            $table->timestamps();

            //relation
            $table->foreign('grupo_obrero_id')->references('id')->on('grupo_obreros')
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
        Schema::dropIfExists('obreros');
    }
}
