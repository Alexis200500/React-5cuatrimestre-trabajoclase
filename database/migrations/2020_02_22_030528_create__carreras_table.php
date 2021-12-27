<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carreras', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Identificador de la tabla carreras');
            $table->unsignedInteger('direccion_id')->comment('Identificador relacionado con la tabla direcciones');
            $table->string('carrera',100)->comment('Nombre de la carrera');
            $table->string('abreviatura',10)->comment('Abreviatura del nombre de la carrera');
            $table->enum('estatus',['activo','inactivo'])->comment('La carrera esta disponible');
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
        Schema::dropIfExists('carreras');
    }
}
