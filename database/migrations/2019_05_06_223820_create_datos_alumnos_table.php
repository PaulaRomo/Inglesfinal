<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatosAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datos_alumnos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('IntExt');
            $table->string('numcontrol',100)->unique();
            $table->string('sexo');
            $table->string('activo')->nullable();
            $table->string("carrera")->nullable();
            $table->string('semestre')->nullable();
            $table->string('path_certificado')->default('default.pdf');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('datos_alumnos');
    }
}
