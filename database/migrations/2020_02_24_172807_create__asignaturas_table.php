<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Identificador de la tabla asignaturas');
            $table->unsignedInteger('carrera_id')->comment('Identificador relacionado con la tabla carreras');
            $table->string('asignatura',100)->comment('Nombre de la asignatura');
            $table->string('abreviatura',10)->comment('Abreviatura del nombre de la asignatura');
            $table->enum('estatus',['activo','inactivo'])->comment('La asignatura esta disponible');
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
        Schema::dropIfExists('asignaturas');
    }
}
