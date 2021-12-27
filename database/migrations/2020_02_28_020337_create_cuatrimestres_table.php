<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuatrimestresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuatrimestres', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Identificador de la tabla cuatrimestres');
            $table->integer('cuatrimestre')->comment('Numero del cuatrimestre');
            $table->date('fecha_inicio')->comment('Fecha de Inicio');
            $table->date('fecha_termino')->comment('Fecha de termino');
            $table->enum('estatus',['activo','inactivo'])->comment('El cuatrimestre esta disponible');
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
        Schema::dropIfExists('cuatrimestres');
    }
}
