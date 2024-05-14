<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User as ModelsUser;

class User extends Controller
{
    function createUser():object
    {
        $user= ModelsUser::create([
            'name' =>'Administrador',
            'email' =>'admin@admin.com',
            'password' =>bcrypt('p1{g6X9OXq')
        ]);
        return response()->json(['succes'=>$user]);
    }
}