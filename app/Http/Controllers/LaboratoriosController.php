<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\laboratorios;
use Validator;
use Illuminate\Support\Str;
use App\Http\Resources\Laboratorio as LaboratorioResource;
use Illuminate\Validation\Rule;

class LaboratoriosController extends Controller
{
    private $validationRules = [
        
         'laboratorio' => 'required|min:5|max:255'
        , 'abreviatura' => 'required|min:2|max:10|unique:asignaturas,abreviatura'
        , 'estatus' => 'required|in:Activo,Inactivo'
        
    ];

    private $attributeNames = [
       
        'laboratorio' => 'laboratorio'
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
        return LaboratorioResource::collection(laboratorios::paginate());
    }

    public function store(Request $request)
    {
        $this->setValidator($request)->validate(); //Aplica reglas de validacion
        if ($laboratorio = laboratorios::create(
                $request->all()
            )){
            return new LaboratorioResource($laboratorio);
            }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear la laboratorios']
        ], 422);
    }

    public function show($id){
        $laboratorio = laboratorios::find($id);
        if (null === $laboratorio){
            return response()->json([
                'errors' => ['id' => 'laboratorios no encontrada: ' .$id]
            ], 404);
        }
        return new LaboratorioResource($laboratorio);
    }

    public function update(Request $request, $id){
        $laboratorio = laboratorios::find($id);
        if (null === $laboratorio){
            return response()->json([
                'errors' => ['id' => 'laboratorios no encontrada: ' .$id]
            ], 404);
        }
        $this->setValidator($request, [
            'abreviatura' => ['required', Rule::unique('asignaturas')->ignore($laboratorio->id, 'id')]
        ])->validate();
        if ($laboratorio->update($request->all())){
            return new LaboratorioResource($laboratorio);
        }
        return response()->json([
            'errors' => ['id' => 'laboratorios no encontrada: ' . $id]
        ], 422);
    }

    public function destroy($id){
        $laboratorio = laboratorios::find($id);
        if (null === $laboratorio){
            return response()->json([
                'errors' => ['id' => 'laboratorios no encontrada: ' . $id]
            ], 404);
        }
        $laboratorio->delete();
        return response()->json([
            'message' => 'laboratorios eliminada: ' . $id
        ], 200);
    }
}
