<?php

use Illuminate\Database\Seeder;
use App\cuatrimestres;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class CuatrimestresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $token = 'Q7TI4u1MmzF66Bdf0tWfst69yWejeFmnLk31F5f369c3vqRqibSVPKXzTh9w';
        cuatrimestres::insert([
            'cuatrimestre' => 1
            ,'fecha_inicio' => '2020-09-03 '
            ,'fecha_termino' => '2020-12-22 '
            ,'api_token' => hash('sha256', $token)
            ,'estatus' => 'Activo'
            ,'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
            ,'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')            
        ]);
    }
}
