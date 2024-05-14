<?php
namespace App\Http\Controllers\fototeca;

use App\Http\Controllers\Controller;
use App\Http\Controllers\fototeca\Implement\FototecaImplement;
use Illuminate\Http\Request;

class FototecaController extends Controller
{
    private $fototeca;
    function __construct(FototecaImplement $implement)
    {
        $this->fototeca = $implement;
    }

    function create(Request $request):object
    {   
        // validar imagen 
        $request = $request->validate(
            [
                'imagen'=>'required|image|max:50000|mimes:png,jpg',
                'seccion'=>'required',

            ],
            [
                'imagen.required'=>'la Imagen es obligatorio',
                'imagen.image' => 'El archivo que se adjunto no es una imagen',
                'imagen.max'=>'la Imagen es muy pesada,maximo 50 mb ',
                'imagen.mimes'=>'la Imagen no tiene un formato valido png o jpg',
                'seccion.required'=>'La seccion a la que pertenece es obligatoria',
            ]
        );
        // implement
        $estatus = $this->fototeca->saveNewFoto($request['imagen'],$request['seccion']);
        return response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200);
        // return response()->json($request);
    }

    function delete(Request $request):object
    {
        $request = $request->validate(
            [
                'id'=>'required|exists:fototecas,id',
            ],
            [
                'id.required' => 'Es obligatorio el id',
                'id.exists' => 'El id No existe'
            ]
            );
        $estatus = $this->fototeca->deleteFoto($request['id']);
        return response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200);
    }
    function index():object
    {
        $estatus = $this->fototeca->indexFotos();
        return response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200);
    }
}
