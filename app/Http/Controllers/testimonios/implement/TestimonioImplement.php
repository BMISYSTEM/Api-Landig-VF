<?php
namespace App\Http\Controllers\testimonios\implement;

use App\Http\Controllers\testimonios\interface\TestimoniosInterface;
use App\Models\testimonio;
use Illuminate\Support\Facades\Storage;

class TestimonioImplement implements TestimoniosInterface
{
    function createTestimonio(string $video, string $descripcion): array
    {
        try {
            $urlVideo = Storage::url(Storage::putFile('public/testimonios',$video));
            $testimonio = testimonio::create([
                'descripcion'=>$descripcion,
                'video'=>$urlVideo
            ]); 
            return ['succes'=>'Se creo el testimonio'];
        } catch (\Throwable $th) {
            return ['error'=>'Error inesperado del servidor error'.$th];
        }
    }

    function deleteTestimonio(int $id): array
    {
        try {
            $testimonio = testimonio::find($id)->delete();
            return ['succes'=>'Se elimino el testimonio'];
        } catch (\Throwable $th) {
            return ['error'=>'Error inesperado del servidor error'.$th];
        }
    }

    function indexTestimonio(): array
    {
        try {
            $testimonios = testimonio::all();
            return ['succes'=>$testimonios];
        } catch (\Throwable $th) {
            return ['error'=>'Error inesperado del servidor error'.$th];
        }
    }
}