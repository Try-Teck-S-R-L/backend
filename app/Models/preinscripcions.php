<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class preinscripcions extends Model
{
    use HasFactory;
    protected $fillable = [
        'idPreinscripcion', 'fechaPreinscripcion', 'voucherPreinscripcion', 'nombreEquipo', 'paisEquipo',
        'idDelegado', 'idCategoria', 'montoPago', 'nroComprobante'
    ];
}
