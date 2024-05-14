<?php
namespace App\Http\Controllers\contacto\interface;

interface ContactoInterface{
    function createContacto($nombre,$apellido,$email,$telefono,$mensaje):array;
    function indexContacto();
}