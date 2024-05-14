<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner_image extends Model
{
    use HasFactory;

    protected $fillable=[
        'imagen',
        'titulo',
        'descripcion'
    ];
}
