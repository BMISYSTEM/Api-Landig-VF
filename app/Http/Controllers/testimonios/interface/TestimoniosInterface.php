<?php 
namespace App\Http\Controllers\testimonios\interface;

interface TestimoniosInterface{

    /**
     * [Description for createTestimonio]
     * Crea un nuevo testimonio y almacena su video en el storage
     * @param string $video
     * @param string $descripcion
     * 
     * @return array
     * 
     */
    function createTestimonio(string $video,string $descripcion):array;

    /**
     * [Description for deleteTestimonio]
     * Elimina el testimonio de la base de datos pero no del storage
     * @param int $id
     * 
     * @return array
     * 
     */
    function deleteTestimonio(int $id):array;

    /**
     * [Description for indexTestimonio]
     * Devuelve todos los testimonios
     * @return array
     * 
     */
    function indexTestimonio():array;
}