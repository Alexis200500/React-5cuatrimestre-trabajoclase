<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('Identificador de la tabla direcciones');
            $table->string('direccion',100)->comment('Nombre de la direccion');
            $table->string('abreviatura',10)->comment('Abreviatura del nombre de la direccion');
            $table->enum('estatus',['activo','inactivo'])->comment('La direccion esta disponible');
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
        Schema::dropIfExists('direcciones');
    }
}
