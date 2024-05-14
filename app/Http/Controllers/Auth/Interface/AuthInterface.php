<?php 

namespace App\Http\Controllers\Auth\Interface;

interface AuthInterface{
    /** inicia seccion y devuelve el bearer token
     * @param string $email
     * @param string $password
     * 
     * @return array
     */
    function login(string $email, string $password):array;

    /** cierra sesion
     * @return array
     */
    function closeLogin():array;
}