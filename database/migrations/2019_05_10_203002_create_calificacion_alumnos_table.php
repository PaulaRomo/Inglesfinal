<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacion_alumnos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('nivel1')->nullable();
            $table->integer('nivel2')->nullable();
            $table->integer('nivel3')->nullable();
            $table->integer('nivel4')->nullable();
            $table->integer('nivel5')->nullable();
            $table->integer('nivel6')->nullable();
            $table->integer('nivelActual')->nullable();
            $table->integer('unidad1')->nullable();
            $table->integer('unidad2')->nullable();
            $table->integer('unidad3')->nullable();
            $table->integer('unidad4')->nullable();
            $table->integer('unidad5')->nullable();
            $table->integer('unidad6')->nullable();
            $table->integer('unidad7')->nullable();
            $table->integer('unidad8')->nullable();
            $table->string('path')->nullable();

            $table->unsignedInteger('calificaciones_id');
            $table->foreign('calificaciones_id')->references('id')->on('users');


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
        Schema::dropIfExists('calificacion_alumnos');
    }
}
