<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipos extends Model
{
    use HasFactory;
    protected $fillable = ['id','nombreEquipo','procedenciaEquipo','colorCamiseta','logoEquipo','idDelegado'
    ,'idCategoria','idPreinscripcion'];
}
