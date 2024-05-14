<?php
namespace App\Http\Controllers\testimonios;

use App\Http\Controllers\Controller;
use App\Http\Controllers\testimonios\implement\TestimonioImplement;
use Illuminate\Http\Request;

class TestimonioController extends Controller
{
    private $testimonio;
    function __construct(TestimonioImplement $implement)
    {
        $this->testimonio = $implement;
    }

    function createTestimonio(Request $request): object
    {
        $request = $request->validate(
            [
                'descripcion' => 'required|max:500',
                'video'=>'required|mimes:mp4'
            ],
            [
                'descripcion.required'=>'La descripcion es obligatorio',
                'descripcion.max'=>'La descripcion es muy larga maximo 500 caracteres',
                'video.required'=>'El video es obligatorio',
                'video.mimes'=>'El video no cuenta con el formato solicitado mp4',
                'video.max'=>'El video Es demasiado grande, optimice el video o recortelo',
            ]
            );
        $estatus = $this->testimonio->createTestimonio($request['video'],$request['descripcion']);
        return Response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200);
    }

    function deleteTestimonio(Request $request): object
    {
        $request = $request->validate(
            [
                'id' => 'required|exists:testimonios,id'
            ],
            [
                'id.required'=>'El id del testimonio es obligatorio',
                'id.exists'=>'El id no existe'
            ]
            );
        $estatus = $this->testimonio->deleteTestimonio($request['id']);
        return response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200);
    }

    function indexTestimonio(): object
    {
        $estatus = $this->testimonio->indexTestimonio();
        return response()->json($estatus,array_key_exists('error',$estatus) ? 500 : 200);
    }

}