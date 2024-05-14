<?php
namespace App\Http\Controllers\banner\implement;

use App\Http\Controllers\banner\interface\BannerInterface;
use App\Models\banner_image;
use Illuminate\Support\Facades\Storage;

class BannerImplement implements BannerInterface
{
    function createBanner( string $titulo, string $descipcion): array
    {
        try {
            $exists = banner_image::find(1);
            // valida si ya esta elbanner creado
            if($exists)
            {   
                $exists->titulo = $titulo;
                $exists->descripcion = $descipcion;
                $exists->save();
            }else{
                // crear un nuevo elemento en el banner
                $banner = banner_image::create(
                    [
                        // 'imagen'=>$imagenbanner,
                        'titulo'=>$titulo,
                        'descripcion'=>$descipcion
                    ]
                );
            }
            return ['succes'=>'Se guardo la informacion de forma correcta'];
        } catch (\Throwable $th) {
            return ['error'=>'Se genero un error inesperado en el servidor error:'.$th];
        }
    }
    function indexBanner(): array
    {
        try {
            $banner = banner_image::find(1);
            return ['succes'=>$banner ];
        } catch (\Throwable $th) {
            return ['error'=>'Se genero un error inesperado en el servidor error:'.$th];
        }
    }

    function saveImagen(string $imagen): array
    {
        try {
            $imagenbanner = Storage::url(Storage::putFile('public/banner',$imagen));
            $banner = banner_image::find(1);
            if($banner)
            {
                $banner->imagen = $imagenbanner;
                $banner->save();
            }
            return ['succes'=>'La imagen se almaceno de forma correcta'];
        } catch (\Throwable $th) {
            return ['error'=>'Se genero un error inesperado en el servidor error:'.$th];
        }
    }
}