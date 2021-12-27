<?php

use Illuminate\Http\Request;
use App\Http\Resources\Usuario as UsuarioResource;
use App\User;
use App\Http\Resources\Direccion as DireccionResource;
use App\Direcciones;
use App\Http\Resources\Carrera as CarreraResource;
use App\Carreras;
use App\Http\Resources\Asignatura as AsignaturaResource;
use App\Asignaturas;
use App\Http\Resources\Laboratorio as LaboratorioResource;
use App\laboratorios;
use App\Http\Resources\cuatrimestre as CuatrimestreResource;
use App\cuatrimestres;

use App\Http\Resources\dia_feriado as DiaFeriadoResource;
use App\dias_feriados;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/usuarios', function (Request $request) {
    return UsuarioResource::collection(User::paginate());
});

Route::group(['middleware' => ['auth:api']], function() {
    Route::resource('usuarios', 'UsuariosController')
    ->except([ 'index', 'create', 'edit']);
    Route::resource('direcciones', 'DireccionController')
    ->except(['create', 'edit']);
    Route::resource('carreras', 'CarrerasController')
    ->except(['create', 'edit']);
    Route::resource('asignaturas', 'AsignaturasController')
    ->except(['create', 'edit']);
    Route::resource('laboratorios', 'LaboratoriosController')
    ->except(['create', 'edit']);
    Route::resource('cuatrimestres', 'CuatrimestresController')
    ->except(['create', 'edit']);
    Route::resource('diasferiados', 'DiaFeriadoController')
    ->except(['create', 'edit']);
    Route::resource('unidades_medidas', 'UnidadMedidasController')
    ->except(['create', 'edit']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
