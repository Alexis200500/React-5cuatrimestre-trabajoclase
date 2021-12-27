<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\unidades_medidas;
use Validator;
use Illuminate\Support\Str;
use App\Http\Resources\unidad_medida as UmedidaResource;
use Illuminate\Validation\Rule;

class UnidadMedidasController extends Controller
{
    private $validationRules = [
       
         'unidad_medida' => 'required|min:5|max:255'
        , 'abreviatura' => 'required|min:2|max:10|unique:carreras,abreviatura'
        , 'estatus' => 'required|in:Activo,Inactivo'
        
    ];

    private $attributeNames = [
        
         'unidad_medida' => 'unidad_medida'
        , 'abreviatura' => 'abreviatura'
        , 'estatus' => 'estatus'
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
        return UmedidaResource::collection(unidades_medidas::paginate());
    }

    public function store(Request $request)
    {
        $this->setValidator($request)->validate(); //Aplica reglas de validacion
        if ($umedida = unidades_medidas::create(
                $request->all()
            )){
            return new UmedidaResource($umedida);
            }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear la Carrera']
        ], 422);
    }

    public function show($id){
        $umedida = unidades_medidas::find($id);
        if (null === $umedida){
            return response()->json([
                'errors' => ['id' => 'Carrera no encontrada: ' .$id]
            ], 404);
        }
        return new UmedidaResource($umedida);
    }

    public function update(Request $request, $id){
        $umedida = unidades_medidas::find($id);
        if (null === $umedida){
            return response()->json([
                'errors' => ['id' => 'Carrera no encontrada: ' .$id]
            ], 404);
        }
        $this->setValidator($request, [
            'abreviatura' => ['required', Rule::unique('carreras')->ignore($umedida->id, 'id')]
        ])->validate();
        if ($umedida->update($request->all())){
            return new UmedidaResource($umedida);
        }
        return response()->json([
            'errors' => ['id' => 'Carrera no encontrada: ' . $id]
        ], 422);
    }

    public function destroy($id){
        $umedida = unidades_medidas::find($id);
        if (null === $umedida){
            return response()->json([
                'errors' => ['id' => 'Carrera no encontrada: ' . $id]
            ], 404);
        }
        $umedida->delete();
        return response()->json([
            'message' => 'Carrera eliminada: ' . $id
        ], 200);
    }
}
