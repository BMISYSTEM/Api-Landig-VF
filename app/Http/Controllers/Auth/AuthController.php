<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Auth\Implement\AuthImplement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $auth;
    function __construct(AuthImplement $implementacion)
    {
        $this->auth = $implementacion;
    }

    function login(Request $request):object
    {
        // validar
        $validate = $request->validate(
            [
                'email'=>'required|email|exists:users,email',
                'password'=>'required'
            ],
            [
                'email.required'=>'El email es obligatorio',
                'email.email'=> 'El email digitado no tiene el formato esperado',
                'email.exists' => 'El email que digito no existe',
                'password'=> 'El password es obligatorio'
            ]
        );
        // ejecutar implementacion
        $estatus = $this->auth->login($validate['email'],$validate['password']);
        // devolver token
        return response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200);
    }

    function closeLogin():object
    {
        $estatus = $this->auth->closeLogin();
        // devolver token
        return response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200);
    }

}
