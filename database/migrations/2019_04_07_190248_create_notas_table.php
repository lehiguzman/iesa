<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id'); 
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('materia_id'); 
            $table->foreign('materia_id')->references('id')->on('materias');
            $table->unsignedInteger('periodo_id'); 
            $table->foreign('periodo_id')->references('id')->on('periodos');
            $table->unsignedInteger('prof_id'); 
            $table->foreign('prof_id')->references('id')->on('users');
            $table->integer('nota')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notas');
    }
}
