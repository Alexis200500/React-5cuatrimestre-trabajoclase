<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dias_feriados;
use Validator;
use Illuminate\Support\Str;
use App\Http\Resources\dia_feriado as DiaFeriadoResource;
use Illuminate\Validation\Rule;


class DiaFeriadoController extends Controller
{
    private $validationRules = [
        'dia_feriado'
              
    ];

    private $attributeNames = [
        'dia_feriado' => 'dia_feriado'

    ];

    protected function setValidator(Request $request,
        $replaceValidationRules = [])
    {
        return Validator::make(
            $request->all()
            , array_merge(
                $this->validationRules
                , $replaceValidationRules
            )
        )
        ->setAttributeNames($this->attributeNames);
    }

    public function index(Request $request){
        return DiaFeriadoResource::collection(dias_feriados::paginate());
    }

    public function store(Request $request)
    {
        $this->setValidator($request)->validate(); //Aplica reglas de validacion
        if ($dia_feriado = dias_feriados::create(
                $request->all()
            )){
            return new DiaFeriadoResource($dia_feriado);
            }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear la Carrera']
        ], 422);
    }

    public function show($id){
        $dia_feriado = dias_feriados::find($id);
        if (null === $dia_feriado){
            return response()->json([
                'errors' => ['id' => 'Carrera no encontrada: ' .$id]
            ], 404);
        }
        return new DiaFeriadoResource($dia_feriado);
    }

    public function update(Request $request, $id){
        $dia_feriado = dias_feriados::find($id);
        if (null === $dia_feriado){
            return response()->json([
                'errors' => ['id' => 'Carrera no encontrada: ' .$id]
            ], 404);
        }
        $this->setValidator($request, [
            'abreviatura' => ['required', Rule::unique('carreras')->ignore($dia_feriado->id, 'id')]
        ])->validate();
        if ($dia_feriado->update($request->all())){
            return new DiaFeriadoResource($dia_feriado);
        }
        return response()->json([
            'errors' => ['id' => 'Carrera no encontrada: ' . $id]
        ], 422);
    }

    public function destroy($id){
        $dia_feriado = dias_feriados::find($id);
        if (null === $dia_feriado){
            return response()->json([
                'errors' => ['id' => 'Carrera no encontrada: ' . $id]
            ], 404);
        }
        $dia_feriado->delete();
        return response()->json([
            'message' => 'Carrera eliminada: ' . $id
        ], 200);
    }
}
