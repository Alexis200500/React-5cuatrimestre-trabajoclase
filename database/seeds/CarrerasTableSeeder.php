<?php

use Illuminate\Database\Seeder;
use App\Carreras;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class CarrerasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $token = 'Q7TI4u1MmzF66Bdf0tWfst69yWejeFmnLk31F5f369c3vqRqibSVPKXzTh9w';
        Carreras::insert([
            'direccion_id'=>1,
            'carrera' => 'Desarrollo de Software Multiplataforma'
            ,'abreviatura' => 'DSM'
            ,'api_token' => hash('sha256', $token)
            ,'estatus' => 'Activo'
            ,'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
            ,'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')            
        ]);
    }
}
