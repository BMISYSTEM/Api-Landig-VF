<?php
namespace App\Http\Controllers\Noticias\Implement;

use App\Http\Controllers\Noticias\Interface\NoticiasInterface;
use App\Models\noticia;
use Illuminate\Support\Facades\Storage;

class NoticiasImplement implements NoticiasInterface
{
    // noticias

    function createNoticia($titulo, $imagen, $noticia): array
    {
        try {
            $urlImagen = Storage::url(Storage::putFile('/public/noticias',$imagen));
            $estatus = noticia::create(
                [
                    'titulo' => $titulo,
                    'imagen' => $urlImagen,
                    'noticia'=>$noticia
                ]
                );
            return ['succes'=>'Se creo de forma correcta la noticia'];
        } catch (\Throwable $th) {
            return ['error'=>'Error inesperado en el servidor '.$th];
        }
    }

    function updateNoticia($id, $titulo, $imagen, $noticia): array
    {
        try {
            $noticia = noticia::find($id);
            $noticia->titulo = $titulo;
            $noticia->noticia = $noticia;
            if($imagen)
            {
                $urlImagen = Storage::url(Storage::putFile('/public/noticias',$imagen));
                $noticia->imagen = $urlImagen;
            }
            $noticia->save();

            return ['succes'=>'Se actualizo de forma correcta la noticia'];
        } catch (\Throwable $th) {
            return ['error'=>'Error inesperado en el servidor '.$th];
        }
    }

    function findNoticia($id): array
    {
        try {
            $noticia = noticia::find($id)->delete;
            return ['succes'=>'Se creo de forma correcta la noticia'];
        } catch (\Throwable $th) {
            return ['error'=>'Error inesperado en el servidor '.$th];
        }
    }

    function deleteNoticia($id): array
    {
        try {

            $noticia = noticia::find($id);
            return ['succes'=>$noticia];
        } catch (\Throwable $th) {
            return ['error'=>'Error inesperado en el servidor '.$th];
        }
    }
    function allNoticias(): array
    {
        try {
            $noticia = noticia::all();
            return ['succes'=>$noticia];
        } catch (\Throwable $th) {
            return ['error'=>'Error inesperado en el servidor '.$th];
        }
    }
}