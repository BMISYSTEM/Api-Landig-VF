<?php 
namespace App\Http\Controllers\mision\interface;



interface MisionInterface{

    /**
     * [Description for saveImagenMision]
     *  Guarda la imagen en el servidor y almacena la ruta en la base de datos
     * @param string $imagen
     * 
     * @return array
     * 
     */
    public function saveImagenMision(string $imagen):array;

    /**
     * [Description for indexImagenMision]
     *  Devueve la ruta de la imagen almacenada
     * @return array
     * 
     */
    public function indexImagenMision():array;
}
