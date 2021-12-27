<?php

use Illuminate\Database\Seeder;
use App\dias_feriados;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DiaFeriadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $token = 'Q7TI4u1MmzF66Bdf0tWfst69yWejeFmnLk31F5f369c3vqRqibSVPKXzTh9w';
        dias_feriados::insert([
            'dia_feriado'=>'2020-09-03'   
            ,'api_token' => hash('sha256', $token)
            ,'created_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')
            ,'updated_at' => Carbon::now('America/Mexico_City')->format('Y-m-d H:i:s')     
        ]);
    }
}
