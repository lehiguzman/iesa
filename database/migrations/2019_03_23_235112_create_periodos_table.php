<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeriodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->integer('cantidad');
            $table->text('descripcion')->nullable();
            $table->text('observacion')->nullable();        
            $table->unsignedInteger('oferta_id'); 
            $table->foreign('oferta_id')->references('id')->on('ofertas');    
            $table->unsignedInteger('horario_id'); 
            $table->foreign('horario_id')->references('id')->on('horarios');
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
        Schema::dropIfExists('periodos');
    }
}
