<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->text('observacion')->nullable();
            $table->unsignedInteger('oferta_id'); 
            $table->foreign('oferta_id')->references('id')->on('ofertas');
            $table->unsignedInteger('prof_id'); 
            $table->foreign('prof_id')->references('id')->on('users');
            $table->unsignedInteger('aula_id'); 
            $table->foreign('aula_id')->references('id')->on('aulas');
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
        Schema::dropIfExists('materias');
    }
}
