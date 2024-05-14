<?php 
namespace App\Http\Controllers\contacto;

use App\Http\Controllers\contacto\implement\ContactoImplement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    private $contacto;
    function __construct(ContactoImplement $implement)
    {
        $this->contacto = $implement;
    }

    function create(Request $request):object
    {
        $request = $request->validate(
            [
                'nombre' => 'required|min:3',
                'apellido' => 'required|min:3',
                'email' => 'required|email',
                'telefono' => 'required|numeric',
                'mensaje' => 'required|min:10',
            ],
            [
                'nombre.required' =>'El campo nombre obligatorio',
                'apellido.required' =>'El campo apellido obligatorio',
                'email.required' =>'El campo email obligatorio',
                'email.email' =>'El email digitado no es valido',
                'telefono.required' =>'El campo telefono obligatorio',
                'telefono.numeric' =>'El campo telefono digitado debe ser numerico',
                'mensaje.required' =>'El campo mensaje obligatorio',
                'mensaje.min' =>'El campo mensaje debe tener minimo 10 caracteres',
            ]
        );
        $estatus = $this->contacto->createContacto($request['nombre'],$request['apellido'],$request['email'],$request['telefono'],$request['mensaje']);
        return response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200);
    }

    function index()
    {
        $estatus = $this->contacto->indexContacto();
        return response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200);
    }
}
