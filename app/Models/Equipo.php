<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombreEquipo', 'procedenciaEquipo', 'qrEquipo', 'delegado_idDelegado', 'categoria_idCategoria', 'preInscripcion_idPreinscripcion'
    ];
}
