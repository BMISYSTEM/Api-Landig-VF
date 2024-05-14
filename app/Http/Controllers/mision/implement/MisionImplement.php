<?php

namespace App\Http\Controllers\mision\implement;

use App\Http\Controllers\mision\interface\MisionInterface;
use App\Models\mision;
use Illuminate\Support\Facades\Storage;

class MisionImplement implements MisionInterface
{
    public function saveImagenMision(string $imagen): array
    {
        try {
            // almacenar la imagen
            $urlImagen = Storage::url(Storage::putFile('public/mision',$imagen));
            // guardar en la base de datos
            $existImagen = mision::find(1);
            if($existImagen)
            {
                $existImagen->imagen=$urlImagen;
                $existImagen->save();
            }else{
                $imagen = mision::create(
                    [
                        'imagen'=>$urlImagen
                    ]
                );
            }
            return ['succes'=>'La imagen se guardo con exito'];
        } catch (\Throwable $th) {
            return ['error'=>'Erro inesperado en el servidor error:'.$th];
        }
    }
    public function indexImagenMision(): array
    {
        try {
            $imagen = mision::find(1);
            return ['succes'=>$imagen];
        } catch (\Throwable $th) {
            return ['error'=>'Erro inesperado en el servidor error:'.$th];
        }
    }
}
