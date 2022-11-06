<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class equipos extends Model
{
    use HasFactory;
    protected $fillable = [
        'idEquipo', 'nombreEquipo', 'paisEquipo', 'logoEquipo', 'colorCamisetaPrincipal', 
        'colorCamisetaSecundario', 'idDelegado', 'idCategoria', 'idPreinscripcion'
    ];
}
