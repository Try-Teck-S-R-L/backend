<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preinscripcion extends Model
{
    use HasFactory;
    protected $fillable = [
        'idPreinscripcion', 'nombreDelegado', 'email', 'nombreEquipo', 'pais', 'categoria', 'numeroComprobante',
        'montoPago', 'fechaPreinscripcion', 'fotoComprobante', 'habilitado'
    ];
}
