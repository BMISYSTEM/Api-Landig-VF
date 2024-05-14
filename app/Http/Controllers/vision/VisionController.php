<?php
namespace App\Http\Controllers\vision;

use App\Http\Controllers\Controller;
use App\Http\Controllers\vision\Implement\VisionImplement;
use Illuminate\Http\Request;

class VisionController extends Controller 
{
    private $vision;
    function __construct(VisionImplement $implementacion)
    {
        $this->vision = $implementacion;
    }

    function saveImagenVision(Request $request):object
    {
        $request = $request->validate(
            [
                'imagen' => 'required|image|max:50000|mimes:jpg,png'
            ],
            [
                'imagen.required'=>'la Imagen es obligatorio',
                'imagen.image' => 'El archivo que se adjunto no es una imagen',
                'imagen.max'=>'la Imagen es muy pesada,maximo 50 mb ',
                'imagen.mimes'=>'la Imagen no tiene un formato valido png o jpg',
            ]
        );
        $estatus = $this->vision->saveImagenVision($request['imagen']);
        return response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200 );
    }

    function indexImagenVision():object
    {
        $estatus = $this->vision->indexImagenVision();
        return response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200 );
    }
}