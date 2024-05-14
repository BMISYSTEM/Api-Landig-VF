<?php
namespace App\Http\Controllers\vision\Implement;

use App\Http\Controllers\vision\Interface\VisionInterface;
use App\Models\vision;
use Illuminate\Support\Facades\Storage;

class VisionImplement implements VisionInterface
{
    function saveImagenVision(string $imagen): array
    {
        try {
            $urlImagen = Storage::url(Storage::putFile('public/vision',$imagen));
            // guardar en la base de datos
            $existVision = vision::find(1);
            if($existVision){
                $existVision->imagen = $urlImagen;
                $existVision->save();
            }else{
                $vision = vision::create(
                    [
                        'imagen'=>$urlImagen
                    ]
                );
            }
            return ['succes'=>'Se almaceno la imagen de forma correcta'];
        } catch (\Throwable $th) {
            return ['error'=>'Error inesperado en el servidor error'.$th];
        }
    }

    function indexImagenVision(): array
    {
        try {
            $vision = vision::find(1);
            return ['succes'=>$vision];
        } catch (\Throwable $th) {
            return ['error'=>'Error inesperado en el servidor error'.$th];
        }
    }
}
