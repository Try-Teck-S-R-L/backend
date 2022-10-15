<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preinscripcion extends Model
{
    use HasFactory;
    protected $fillable = [
        'categoria', 'nombreDelegado', 'emailDelegado',
        'fechaPreinscripcion', 'nombreEquipo', 'paisEquipo', 'voucherPreinscripcion'
    ];
    //'voucherPreinscripcion'
}
