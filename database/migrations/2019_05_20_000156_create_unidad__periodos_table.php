<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnidadPeriodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad__periodos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('grup_id');
            $table->foreign('grup_id')->references('id')->on('grupos');
            $table->string('Unidades');
            $table->unsignedInteger('perio_id');
            $table->foreign('perio_id')->references('id')->on('periodos');
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
        Schema::dropIfExists('unidad__periodos');
    }
}
