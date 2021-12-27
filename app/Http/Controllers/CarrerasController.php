<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Carreras;
use Validator;
use Illuminate\Support\Str;
use App\Http\Resources\Carrera as CarreraResource;
use Illuminate\Validation\Rule;

class CarrerasController extends Controller
{
    private $validationRules = [
        'direccion_id' => 'required|integer|exists:direcciones,id'
        , 'carrera' => 'required|min:5|max:255'
        , 'abreviatura' => 'required|min:2|max:10|unique:carreras,abreviatura'
        , 'estatus' => 'required|in:Activo,Inactivo'
        
    ];

    private $attributeNames = [
        'direccion_id' => 'direccion'
        , 'carrera' => 'carrera'
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
        return CarreraResource::collection(Carreras::paginate());
    }

    public function store(Request $request)
    {
        $this->setValidator($request)->validate(); //Aplica reglas de validacion
        if ($carrera = Carreras::create(
                $request->all()
            )){
            return new CarreraResource($carrera);
            }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear la Carrera']
        ], 422);
    }

    public function show($id){
        $carrera = Carreras::find($id);
        if (null === $carrera){
            return response()->json([
                'errors' => ['id' => 'Carrera no encontrada: ' .$id]
            ], 404);
        }
        return new CarreraResource($carrera);
    }

    public function update(Request $request, $id){
        $carrera = Carreras::find($id);
        if (null === $carrera){
            return response()->json([
                'errors' => ['id' => 'Carrera no encontrada: ' .$id]
            ], 404);
        }
        $this->setValidator($request, [
            'abreviatura' => ['required', Rule::unique('carreras')->ignore($carrera->id, 'id')]
        ])->validate();
        if ($carrera->update($request->all())){
            return new CarreraResource($carrera);
        }
        return response()->json([
            'errors' => ['id' => 'Carrera no encontrada: ' . $id]
        ], 422);
    }

    public function destroy($id){
        $carrera = Carreras::find($id);
        if (null === $carrera){
            return response()->json([
                'errors' => ['id' => 'Carrera no encontrada: ' . $id]
            ], 404);
        }
        $carrera->delete();
        return response()->json([
            'message' => 'Carrera eliminada: ' . $id
        ], 200);
    }
}
