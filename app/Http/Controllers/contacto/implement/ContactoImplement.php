<?php
namespace App\Http\Controllers\contacto\implement;

use App\Http\Controllers\contacto\interface\ContactoInterface;
use App\Models\contacto;

class ContactoImplement implements ContactoInterface
{
    function createContacto($nombre, $apellido, $email, $telefono, $mensaje): array
    {
        try {
            $create = contacto::create([
                'nombre'=>$nombre,
                'apellido'=>$apellido,
                'email'=>$email,
                'telefono'=>$telefono,
                'mensaje'=>$mensaje,
            ]);
            return ['succes'=>'El mensaje fue enviado con exito, pronto sera contactado por un asesor'];
        } catch (\Throwable $th) {
            return ['error'=>'Error inesperado en el servidor error'.$th];
        }
    }

    function indexContacto()
    {
        try {
            $create = contacto::all();
            return ['succes'=>$create];
        } catch (\Throwable $th) {
            return ['error'=>'Error inesperado en el servidor error'.$th];
        }
    }
}