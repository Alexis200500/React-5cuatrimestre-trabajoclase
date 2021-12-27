<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
    protected $table = 'direcciones';
    
    protected $fillable = ['direccion','abreviatura','estatus'];

    public static function validationRules(){
        return[
            'Direccion'=>'required|min:5|max:100',
            'Abreviatura'=>'required|min:1|max:10',
            'Estatus'=>'required|in: ' . implode(',',self::opcionesEstatus()),
        ];
    }

    public static function attributeNames(){
        return[
            'Direccion'=>'Direccion',
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
