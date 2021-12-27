<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\cuatrimestres;
use Validator;
use Illuminate\Support\Str;
use App\Http\Resources\cuatrimestre as CuatrimestreResource;
use Illuminate\Validation\Rule;

class CuatrimestresController extends Controller
{
    private $validationRules = [
        
         'cuatrimestre' => 'required|min:1|max:2'
      
        , 'estatus' => 'required|in:Activo,Inactivo'
        
    ];

    private $attributeNames = [
        
         'cuatrimestre' => 'cuatrimestre'
        
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
        return CuatrimestreResource::collection(cuatrimestres::paginate());
    }

    public function store(Request $request)
    {
        $this->setValidator($request)->validate(); //Aplica reglas de validacion
        if ($cuatrimestre = cuatrimestres::create(
                $request->all()
            )){
            return new CuatrimestreResource($cuatrimestre);
            }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear la Carrera']
        ], 422);
    }

    public function show($id){
        $cuatrimestre = cuatrimestres::find($id);
        if (null === $cuatrimestre){
            return response()->json([
                'errors' => ['id' => 'Carrera no encontrada: ' .$id]
            ], 404);
        }
        return new CuatrimestreResource($cuatrimestre);
    }

    public function update(Request $request, $id){
        $cuatrimestre = cuatrimestres::find($id);
        if (null === $cuatrimestre){
            return response()->json([
                'errors' => ['id' => 'Carrera no encontrada: ' .$id]
            ], 404);
        }
        $this->setValidator($request, [
            'cuatrimestre' => ['required', Rule::unique('cuatrimestres')->ignore($cuatrimestre->id, 'id')]
        ])->validate();
        if ($cuatrimestre->update($request->all())){
            return new CuatrimestreResource($cuatrimestre);
        }
        return response()->json([
            'errors' => ['id' => 'Carrera no encontrada: ' . $id]
        ], 422);
    }

    public function destroy($id){
        $cuatrimestre = cuatrimestres::find($id);
        if (null === $cuatrimestre){
            return response()->json([
                'errors' => ['id' => 'Carrera no encontrada: ' . $id]
            ], 404);
        }
        $cuatrimestre->delete();
        return response()->json([
            'message' => 'Carrera eliminada: ' . $id
        ], 200);
    }
}
