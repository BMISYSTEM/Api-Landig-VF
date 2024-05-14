<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\banner\BannerController;
use App\Http\Controllers\contacto\ContactoController;
use App\Http\Controllers\fototeca\FototecaController;
use App\Http\Controllers\mision\MisionController;
use App\Http\Controllers\Noticias\NoticiasController;
use App\Http\Controllers\testimonios\TestimonioController;
use App\Http\Controllers\User;
use App\Http\Controllers\Usuarios;
use App\Http\Controllers\vision\VisionController;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

 /*
|--------------------------------------------------------------------------
| rutas privadas
|--------------------------------------------------------------------------
|
| todos los endpoints de el panel como create o update y consulta
|
*/
Route::middleware('auth:sanctum')->group(function(){
    // se estara consultandoconstantemente enel panelpara verificar que el token este funcionando 
    Route::get('/sautenticate', function (Request $request) {
        return response()->json(['succes'=>'autenticate']);
    });
    // creatre banner|update
    Route::post('/banner',[BannerController::class,'createBanner']);
    // almacena la imagen | update abanner en la primera fila
    Route::post('/bannerimage',[BannerController::class,'saveImagen']);
    // alamecnado de imagen de mision
    Route::post('/misionimagen',[MisionController::class,'saveImagenMision']);
    // alamecnado de imagen de vision
    Route::post('/visionimagen',[VisionController::class,'saveImagenVision']);
    // alamecnado de imagen de fototeca
    Route::post('/fototecaimagen',[FototecaController::class,'create']);
    Route::post('/deletefototeca',[FototecaController::class,'delete']);
    // creacion de testimonios
    Route::post('/createtestimonio',[TestimonioController::class,'createTestimonio']);
    Route::post('/deletetestimonio',[TestimonioController::class,'deleteTestimonio']);
    // creacion de noticias
    Route::post('/createnoticia',[NoticiasController::class,'createNoticia']);
    Route::post('/updatenoticia',[NoticiasController::class,'updateNoticia']);
    Route::post('/deletenoticia',[NoticiasController::class,'deleteNoticia']);
});

/*
|--------------------------------------------------------------------------
| rutas publicas
|--------------------------------------------------------------------------
|
| todas las consultas a los archivos planos
|
*/
Route::get('/gererateUser',[User::class,'createUser']);
// login
Route::post('/login',[AuthController::class,'login']);
// consultabanner
Route::get('/banner',[BannerController::class,'indexBanner']);
// consulta mision
Route::get('/mision',[MisionController::class,'indexImagenMision']);
// consulta vision
Route::get('/vision',[VisionController::class,'indexImagenVision']);

Route::get('/link',function(){
    // Artisan::call('storage:link');
    Artisan::call('migrate');
});
// consulta fototeca
Route::get('/fototeca',[FototecaController::class,'index']);
// consulta los videos
Route::get('/testimonios',[TestimonioController::class,'indexTestimonio']);
// contactos
Route::post('/createcontacto',[ContactoController::class,'create']);
Route::get('/idexcontactos',[ContactoController::class,'index']);
// consulta todas las noticias
Route::get('/indexnoticias',[NoticiasController::class,'allNoticias']);
