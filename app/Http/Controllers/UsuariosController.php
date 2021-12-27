<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Str;
use App\Http\Resources\Usuario as UsuarioResource;
Use Illuminate\Validation\Rule;

class UsuariosController extends Controller
{
    private $validationRules = [
        'name' =>'required|min:5|max:255'
        ,'email' =>'required|email|unique:users,email'
        ,'password' =>'required|min:8'
        ,'password_confirmation' =>'required_with:password|same:password'
    ];

private $attributeNames = [
    'name' => 'nombre'
    ,'email' => 'email'
    ,'password' =>'constraseña'
    ,'password_confirmation' => 'confirmacion de contraseña'
];

protected function setValidator(Request $request,
    $replaceValidationRules = [])
    {
        return Validator::make(
            $request->all()
            ,array_merge(
                $this->validationRules
                ,$replaceValidationRules
            )
        )
        ->setAttributeNames($this->attributeNames);
    }

    public function store(Request $request)
    {
        $this->setValidator($request)->validate(); //Llama la función de arriba y aplica las reglas de validación
        $token = Str::random(60); //forma una cadena de forma aleatoria 
        $request->merge([ 
            'password' => bcrypt($request->post('password')) //estamos encriptando la contraseña
            , 'api_token' => hash('sha256', $token) 
        ]);

        if ($usuario = User::create(
            $request->except('password_confirmation') 
        )) {
            return new UsuarioResource($usuario);
        }
        return response()->json([
            'errors' => ['name' => 'No se pudo crear el recurso']
        ], 422);
    }

    public function show($id)
    {
        $usuario = User::find($id);
        if (null == $usuario){
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: '.$id]
            ], 404);
        }
        return new UsuarioResource($usuario);
    }
    public function update (Request $request, $id)
    {
        $token = Str::random(60);
        $usuario = User::find($id);
        if (null === $usuario){
            return response()->json([
                'erros' => ['id' => 'Recurso no encontrado: '.$id]
            ], 404);
        }
        $this->setValidator($request, [
            'email' => ['required', Rule::unique('users')->ignore($usuario->id, 'id')]
            , 'password' => 'bail|nullable|min:8'
            , 'password_confirmation' => 'bail|nullable|required_with:password|same:password|min:8'
        ])->validate();
        if (!empty($request->password)){
            $request->merge([
                'password' => bcrypt($request->post('password'))
                , 'api_token' => hash('sha256', $token)
            ]); 
        } else {
            $request->merge([
                'password' => $usuario->password
                , 'api_token' => hash('sha256', $token)
            ]);
        }
        if ($usuario->update($request->except('password_confirmation'))){
            return new UsuarioResource($usuario);
        }
        return response()->json([
            'errors' => ['id' => 'Recurso no encontrado: '. id]
        ], 422);
    }
    
    public function destroy($id)
    {
        $usuario = User::find($id);
        if (null === $usuario){
            return response()->json([
                'errors' => ['id' => 'Recurso no encontrado: '. $id]
            ], 404);
        }
        $usuario->delete();
        return response()->json([
            'message' => 'Recurso eliminado: ' . $id
        ], 200);
    }
}
