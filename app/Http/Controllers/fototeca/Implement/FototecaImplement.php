<?php 
namespace App\Http\Controllers\fototeca\Implement;

use App\Http\Controllers\fototeca\Interface\FototecaInterface;
use App\Models\fototeca;
use Illuminate\Support\Facades\Storage;

class FototecaImplement implements FototecaInterface
{
    function saveNewFoto(string $foto, int $seccion): array
    {
        try {
            // guardar imagen en local storage
            $urlImagen = Storage::url(Storage::putFile('public/fototeca',$foto));
            // // guardar en la base de datos
            $fototeca = fototeca::create(
                [
                    'imagen'=>$urlImagen,
                    'seccion'=>$seccion
                ]
            );
            return ['succes'=>'Imagen Guardada con exito'];
        } catch (\Throwable $th) {
            return ['error'=>'Se genero un error en el servidor erro:'.$th];
        }
    }

    function deleteFoto(int $id): array
    {
        try {
            // $fototeca = fototeca::find($id);
            // $fototeca->delete();
            $fototecas = fototeca::find($id)->delete();
            return ['succes'=>'Imagen eliminada con exito'];
        } catch (\Throwable $th) {
            return ['error'=>'Se genero un error en el servidor erro:'.$th];
        }
    }

    function indexFotos(): array
    {
        try {
            $fototeca = fototeca::all();
            return ['succes'=>$fototeca];
        } catch (\Throwable $th) {
            return ['error'=>'Se genero un error en el servidor erro:'.$th];
        }
    }
}
