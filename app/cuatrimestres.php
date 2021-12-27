<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cuatrimestres extends Model
{
    protected $table = 'cuatrimestres';
    
    protected $fillable = ['cuatrimestre','fecha_inicio','fecha_termino','estatus'];

    public static function validationRules(){
        return[
            'cuatrimestre'=>'required|integer|min:1|max:2',  //'required|integer'
            
            'Estatus'=>'required|in: ' . implode(',',self::opcionesEstatus()),
        ];
    }

    public static function attributeNames(){
        return[
            'Cuatrimestre'=>'Cuatrimestre',
            
            'Estatus'=>'Estatus',
        ];
    }

    public static function opcionesEstatus(){
        return[
            'Activo'=>'Activo',
            'Inactivo'=>'Inactivo',
        ];
    }
}
