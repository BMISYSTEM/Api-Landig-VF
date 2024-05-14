<?php
namespace App\Http\Controllers\banner;

use App\Http\Controllers\banner\implement\BannerImplement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    private $banner;
    function __construct(BannerImplement $implement)
    {
        $this->banner = $implement;
    }
    function createBanner(Request $request):object
    {
        // validacion de los datos 
        $request = $request->validate(
            [
                'titulo'=>'required|min:5|max:225',
                'descripcion'=>'required|min:5|max:225',
            ],
            [
                'titulo.required'=>'El titulo es obligatorio',
                'titulo.min'=>'Eltitulo es muy corto minimo 5 caracteres',
                'titulo.max'=>'El titulo es muy largo minimo 225 caracteres',
                'descripcion.required'=>'La descripcion es obligatorio',
                'descripcion.min'=>'La descripcion es muy corto minimo 5 caracteres',
                'descripcion.max'=>'La descripcion es muy largo minimo 225 caracteres',

            ]
        );
        // ejecutar implementacion
        $estatus = $this->banner->createBanner($request['titulo'],$request['descripcion']);
        // respuesta
        return response()->json($estatus,array_key_exists('error',$estatus)? 500 :200);
    }

    function indexBanner():object
    {
        $estatus = $this->banner->indexBanner();
        return response()->json($estatus,array_key_exists('error',$estatus)? 500 :200);
    }
    function saveImagen(Request $request):object
    {
        $request = $request->validate(
            [
                'imagen'=>'required|max:5000|image|mimes:png,jpg',

            ],
            [
                'imagen.required'=>'la Imagen es obligatorio',
                'imagen.image' => 'El archivo que se adjunto no es una imagen',
                'imagen.max'=>'la Imagen es muy pesada,maximo 50 mb ',
                'imagen.mimes'=>'la Imagen no tiene un formato valido png o jpg',

            ]
        );
        $estatus = $this->banner->saveImagen($request['imagen']);
        return response()->json($estatus,array_key_exists('error',$estatus)? 500 :200);
        // return response()->json($request);
    }
}