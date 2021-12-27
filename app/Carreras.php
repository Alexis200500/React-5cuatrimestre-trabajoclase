<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carreras extends Model
{
    protected $table = 'carreras';
    
    protected $fillable = ['direccion_id','carrera','abreviatura','estatus'];

    public static function validationRules(){
        return[
            'Carrera'=>'required|min:5|max:100',
            'Abreviatura'=>'required|min:1|max:10',
            'Estatus'=>'required|in: ' . implode(',',self::opcionesEstatus()),
        ];
    }

    public static function attributeNames(){
        return[
            'Carrera'=>'Carrera',
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
