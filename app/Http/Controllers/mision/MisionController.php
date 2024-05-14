<?php 
namespace App\Http\Controllers\mision;

use App\Http\Controllers\Controller;
use App\Http\Controllers\mision\implement\MisionImplement;
use Illuminate\Http\Request;

class MisionController extends Controller
{
    private $mision;
    function __construct(MisionImplement $implementacion)
    {
        $this->mision = $implementacion;
    }

    function saveImagenMision(Request $request):object
    {   
        $request = $request->validate(
            [
                'imagen'=>'required|image|max:50000|mimes:png,jpg'
            ],
            [
                'imagen.required'=>'la Imagen es obligatorio',
                'imagen.image' => 'El archivo que se adjunto no es una imagen',
                'imagen.max'=>'la Imagen es muy pesada,maximo 50 mb ',
                'imagen.mimes'=>'la Imagen no tiene un formato valido png o jpg',
            ]
        );
        $estatus = $this->mision->saveImagenMision($request['imagen']);
        return response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200);
    }

    function indexImagenMision():object
    {
        $estatus = $this->mision->indexImagenMision();
        return response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200);
    }

}