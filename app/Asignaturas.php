<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignaturas extends Model
{
    protected $table = 'asignaturas';
    
    protected $fillable = ['carrera_id','id','asignatura','abreviatura','estatus'];

    public static function validationRules(){
        return[
            'Asignatura'=>'required|min:5|max:100',
            'Abreviatura'=>'required|min:1|max:10',
            'Estatus'=>'required|in: ' . implode(',',self::opcionesEstatus()),
        ];
    }

    public static function attributeNames(){
        return[
            'Asignatura'=>'Asignatura',
            'Abreviatura'=>'Abreviatura',
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
