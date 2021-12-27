<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class unidades_medidas extends Model
{
    protected $table = 'unidades_medidas';
    
    protected $fillable = ['unidad_medida','abreviatura','estatus'];

    public static function validationRules(){
        return[
            'unidad_medida'=>'required|min:5|max:100',
            'Abreviatura'=>'required|min:1|max:10',
            'Estatus'=>'required|in: ' . implode(',',self::opcionesEstatus()),
        ];
    }

    public static function attributeNames(){
        return[
            'Unidad_Medida'=>'Unidad_Medida',
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
