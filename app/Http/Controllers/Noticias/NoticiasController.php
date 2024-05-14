<?php
namespace App\Http\Controllers\Noticias;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Noticias\Implement\NoticiasImplement;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    private $noticia;
    function __construct(NoticiasImplement $implement)
    {
        $this->noticia = $implement;
    }

    // create
    function createNoticia(Request $request):object
    {   
        $request = $request->validate(
            [
                'titulo'=>'required|min:5|max:225',
                'imagen'=>'required|mimes:jpg,png,jpeg',
                'noticia'=>'required|min:10|max:1000',
            ],
            [
                'titulo.required'=>'Es obligatorio el campo titulo',
                'titulo.min'=>'El titulo es muy corto',
                'titulo.max'=>'El titulo es muy largo',
                'imagen.required'=>'La imagen es obligatoria',
                'imagen.mimes'=>'La imagen no cumple con el formato jpg,png,jpeg',
                'noticia.required'=>'La noticia es obligatoria',
                'noticia.min'=>'La noticia es muy corta ',
                'noticia.max'=>'La noticia supera los 100 caracteres no es permitido'
            ]

        );
        $estatus = $this->noticia->createNoticia($request['titulo'],$request['imagen'],$request['noticia']);
        return response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200);
        
    }
    // update

    function updateNoticia(Request $request):object
    {
        $imagen = null;
        $request = $request->validate(
            [
                'id'=>'required|exists:noticias,id',
                'titulo'=>'required|min:5|max:225',
                'imagen'=>'nullable|mimes:jpg,png,jpeg',
                'noticia'=>'required|min:10|max:1000',
            ],
            [
                'id.required'=>'El id es obligatorio',
                'id.exists'=>'El id no existe',
                'titulo.required'=>'Es obligatorio el campo titulo',
                'titulo.min'=>'El titulo es muy corto',
                'titulo.max'=>'El titulo es muy largo',
                'imagen.mimes'=>'La imagen no cumple con el formato jpg,png,jpeg',
                'noticia.required'=>'La noticia es obligatoria',
                'noticia.min'=>'La noticia es muy corta ',
                'noticia.max'=>'La noticia supera los 100 caracteres no es permitido'
            ]

        );
        if(!($request['imagen']))
        {
            $imagen = null;
        }else{
            $imagen = $request['imagen'];
        }
        $estatus = $this->noticia->updateNoticia($request['id'],$request['titulo'],$imagen,$request['noticia']);
        return response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200);
    }
    // delete
    function deleteNoticia(Request $request):object
    {
        $request = $request->validate(
            [
                'id'=>'required|exists:noticias,id',
            ],
            [
                'id.required'=>'El id es obligatorio',
                'id.exists'=>'El id no existe',
            ]

        );
        $estatus = $this->noticia->deleteNoticia($request['id']);
        return response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200);
    }
    // find
    function findNoticia(Request $request ):object
    {
        $request = $request->validate(
            [
                'id'=>'required|exists:noticias,id',
            ],
            [
                'id.required'=>'El id es obligatorio',
                'id.exists'=>'El id no existe',
            ]

        );
        $estatus = $this->noticia->findNoticia($request['id']);
        return response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200);
    }
    // all
    function allNoticias():object
    {
        $estatus = $this->noticia->allNoticias();
        return response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200);
    }
}