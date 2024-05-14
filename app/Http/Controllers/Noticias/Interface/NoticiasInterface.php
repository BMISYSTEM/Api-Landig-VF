<?php
namespace App\Http\Controllers\Noticias\Interface;

interface NoticiasInterface {

    // create
    function createNoticia($titulo,$imagen,$noticia):array;
    // update
    function updateNoticia($id,$titulo,$imagen,$noticia):array;
    // delete
    function deleteNoticia($id):array;
    // find
    function findNoticia($id):array;
    // all
    function allNoticias():array;
}