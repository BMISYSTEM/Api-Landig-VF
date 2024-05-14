<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testimonio extends Model
{
    use HasFactory;

    protected $fillable =[
        'descripcion',
        'video'
    ];
}
