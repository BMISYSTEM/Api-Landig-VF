<?php

namespace App\Http\Controllers\Auth\Implement;

use App\Http\Controllers\Auth\Interface\AuthInterface;
use Illuminate\Support\Facades\Auth;

class AuthImplement implements AuthInterface
{
    function login(string $email, string $password): array
    {
        try {
            $credenciales = [
                'email'=>$email,
                'password'=>$password
            ];
            //revisar password
            if (!Auth::attempt($credenciales)) {
                return ['error'=>'El password no es correcto'];
            }
            //autenticacion con token
            $user = Auth::user();
            // generar el token
            $token = $user->createToken('token')->plainTextToken;
            return ['succes' =>$token];
        } catch (\Throwable $th) {
            return ['error' => 'Se genero un error inesperado en el servidor error:' . $th];
        }
    }
    function closeLogin(): array
    {
        try {
            return ['succes' => 'se cerro su sesion de forma correcta'];
        } catch (\Throwable $th) {
            return ['error' => 'Se genero un error inesperado en el servidor error:' . $th];
        }
    }
}
