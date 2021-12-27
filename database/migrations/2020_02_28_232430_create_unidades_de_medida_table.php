<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesDeMedidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades_medidas', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('identificador de unidades de medidas');
            $table->string('unidad_medida',100)->comment('Nombre de la unidad de medida');
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
        Schema::dropIfExists('unidades_medidas');
    }
}
