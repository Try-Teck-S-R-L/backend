<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preinscripcion extends Model
{
    use HasFactory;
    protected $fillable = ['idpreInscipcion' . 'categorias', 'nombreDelegado', 'fecha', 'nombreEquipo', 'paisEquipo'];
}
