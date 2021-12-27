<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laboratorios extends Model
{
    protected $table = 'laboratorios';
    
    protected $fillable = ['id','laboratorio','abreviatura','estatus'];

    // public function carreras(){
    //     return $this->belongsTo('App\Carrera','carrera_id','id');
    // }

    public static function validationRules(){
        return[
            'laboratorio'=>'required|min:5|max:100',
            'Abreviatura'=>'required|min:1|max:10',
            'Estatus'=>'required|in: ' . implode(',',self::opcionesEstatus()),
        ];
    }

    public static function attributeNames(){
        return[
            'laboratorio'=>'Laboratorios',
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

