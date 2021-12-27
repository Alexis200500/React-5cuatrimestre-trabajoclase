<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dias_feriados extends Model
{
    protected $table = 'dias_feriados';
    
    protected $fillable = ['dia_feriado'];

    public static function validationRules(){
        return[
            'dia_feriado',
        ];
    }

     public static function attributeNames(){
         return[
            'dia_feriado'=>'dia_feriado',
    //         'Abreviatura'=>'Abreviatura',
    //         'Estatus'=>'Estatus',
         ];
     }

    // public static function opcionesEstatus(){
    //     return[
    //         'Activo'=>'Activo',
    //         'Inactivo'=>'Inactivo',
    //     ];
    // }
}
