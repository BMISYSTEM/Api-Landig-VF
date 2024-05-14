<?php 
namespace App\Http\Controllers\fototeca\Interface;

interface FototecaInterface
{
    /**
     * [Description for saveNewFoto]
     * Guarda una imagen y le agrega la seccion a la que pertenece
     * @param string $foto
     * @param int $seccion
     * 
     * @return array
     * 
     */
    function saveNewFoto(string $foto,int $seccion):array;

    /**
     * [Description for deleteFoto]
     * Elimina una fila de la base de datos
     * @param int $id
     * 
     * @return array
     * 
     */
    function deleteFoto(int $id):array;

    /**
     * [Description for indexFotos]
     * Consulta todas las fotos
     * @return array
     * 
     */
    function indexFotos():array;
}