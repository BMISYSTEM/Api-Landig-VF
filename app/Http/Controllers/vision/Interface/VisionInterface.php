<?php
namespace App\Http\Controllers\vision\Interface;

interface VisionInterface{
    /**
     * [Description for saveImagenVision]
     * Guarda la imagen que se mostrara en vision del home
     * @param string $imagen
     * 
     * @return array
     * 
     */
    public function saveImagenVision(string $imagen):array;

    /**
     * [Description for indexImagenVision]
     * Muestra la ruta de la imagen de vision
     * @return array
     * 
     */
    public function indexImagenVision():array;
}