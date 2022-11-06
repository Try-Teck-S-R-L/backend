<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preinscripciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'idPreinscripcion', 'fechaPreinscripcion', 'voucherPreinscripcion', 'nombreEquipo', 'paisEquipo',
        'idDelegado', 'idCategoria', 'montoPago', 'numeroComprobante'
    ];
}
