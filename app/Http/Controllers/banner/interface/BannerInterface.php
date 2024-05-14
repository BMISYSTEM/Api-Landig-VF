<?php
namespace App\Http\Controllers\banner\interface;

interface BannerInterface{

    /** crea o actualiza el banner principal cambia la imagen o el fondo y su informacion
     * @param string $titulo
     * @param string $descipcion
     * 
     * @return array
     */
    function createBanner(string $titulo,string $descipcion):array;
    /** Guardala imagen
     * @param string $imagen
     * 
     * @return array
     */
    function saveImagen(string $imagen):array;
    /** devuelve la informacion del banner 
     * @return array
     */
    function indexBanner():array;
}