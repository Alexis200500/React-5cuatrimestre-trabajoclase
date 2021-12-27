<?php

namespace App\Http\Controllers;
use Validator;
use App\Asignaturas;
use Illuminate\Support\Str;
use App\Http\Resources\Asignatura as AsignaturaResource;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;

class AsignaturasController extends Controller
{
    private $validationRules = [
        'carrera_id' => 'required|integer|exists:carreras,id'
        , 'asignatura' => 'required|min:5|max:255'
        , 'abreviatura' => 'required|min:2|max:10|unique:asignaturas,abreviatura'
        , 'estatus' => 'required|in:Activo,Inactivo'
        
    ];

    private $attributeNames = [
        'carrera_id' => 'carrera'
        , 'asignatura' => 'asignatura'
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
        return AsignaturaResource::collection(Asignaturas::paginate());
    }

    public function store(Request $request)
    {
        $this->setValidator($request)->validate(); //Aplica reglas de validacion
        if ($asignatura = Asignaturas::create(
                $request->all()
            )){
            return new AsignaturaResource($asignatura);
            }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear la Asignatura']
        ], 422);
    }

    public function show($id){
        $asignatura = Asignaturas::find($id);
        if (null === $asignatura){
            return response()->json([
                'errors' => ['id' => 'Asignatura no encontrada: ' .$id]
            ], 404);
        }
        return new AsignaturaResource($asignatura);
    }

    public function update(Request $request, $id){
        $asignatura = Asignaturas::find($id);
        if (null === $asignatura){
            return response()->json([
                'errors' => ['id' => 'Asignatura no encontrada: ' .$id]
            ], 404);
        }
        $this->setValidator($request, [
            'abreviatura' => ['required', Rule::unique('asignaturas')->ignore($asignatura->id, 'id')]
        ])->validate();
        if ($asignatura->update($request->all())){
            return new AsignaturaResource($asignatura);
        }
        return response()->json([
            'errors' => ['id' => 'Asignatura no encontrada: ' . $id]
        ], 422);
    }

    public function destroy($id){
        $asignatura = Asignaturas::find($id);
        if (null === $asignatura){
            return response()->json([
                'errors' => ['id' => 'Asignatura no encontrada: ' . $id]
            ], 404);
        }
        $asignatura->delete();
        return response()->json([
            'message' => 'Asignatura eliminada: ' . $id
        ], 200);
    }
}
