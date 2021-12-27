<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Direcciones;
use Validator;
use Illuminate\Support\Str;
use App\Http\Resources\Direccion as DireccionResource;
use Illuminate\Validation\Rule;

class DireccionController extends Controller
{
    private $validationRules = [
        'direccion' => 'required|min:5|max:255'
        , 'abreviatura' => 'required|min:2|max:10|unique:direcciones,abreviatura'
        , 'estatus' => 'required|in:Activo,Inactivo'
        
    ];

    private $attributeNames = [
        'direccion' => 'direccion'
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
        return DireccionResource::collection(Direcciones::paginate());
    }

    public function store(Request $request)
    {
        $this->setValidator($request)->validate(); //Aplica reglas de validacion
        if ($direccion = Direcciones::create(
                $request->all()//Tomar todos los campos excepto password_coonfirmation
            )){
            return new DireccionResource($direccion);
            }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear la Direccion de Carrera']
        ], 422);
    }

    public function show($id){
        $direccion = Direcciones::find($id);
        if (null === $direccion){
            return response()->json([
                'errors' => ['id' => 'Direccion de Carrera no encontrada: ' .$id]
            ], 404);
        }
        return new DireccionResource($direccion);
    }

    public function update(Request $request, $id){
        $direccion = Direcciones::find($id);
        if (null === $direccion){
            return response()->json([
                'errors' => ['id' => 'Direccion de Carrera no encontrada: ' .$id]
            ], 404);
        }
        $this->setValidator($request, [
            'abreviatura' => ['required', Rule::unique('direcciones')->ignore($direccion->id, 'id')]
        ])->validate();
        if ($direccion->update($request->all())){
            return new DireccionResource($direccion);
        }
        return response()->json([
            'errors' => ['id' => 'Direccion de Carrera no encontrada: ' . $id]
        ], 422);
    }

    public function destroy($id){
        $direccion = Direcciones::find($id);
        if (null === $direccion){
            return response()->json([
                'errors' => ['id' => 'Direccion de Carrera no encontrada: ' . $id]
            ], 404);
        }
        $direccion->delete();
        return response()->json([
            'message' => 'Direccion de Carrera eliminada: ' . $id
        ], 200);
    }
}
