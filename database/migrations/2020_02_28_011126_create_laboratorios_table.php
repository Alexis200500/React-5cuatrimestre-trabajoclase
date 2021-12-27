<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratoriosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratorios', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Identificador de la tabla laboratorios');
          
            $table->string('laboratorio',100)->comment('Nombre de la laboratorio');
            $table->string('abreviatura',10)->comment('Abreviatura del nombre de la laboratorio');
            $table->enum('estatus',['activo','inactivo'])->comment('La laboratorio esta disponible');
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
        Schema::dropIfExists('laboratorios');
    }
}
