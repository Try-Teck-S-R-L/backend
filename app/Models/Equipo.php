<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $fillable = ['id','nombreEquipo','procedenciaEquipo','colorCamiseta','logoEquipo','delegado_idDelegado'
,'categoria_idCategoria','preInscripcion_idPreinscripcion'];
}
