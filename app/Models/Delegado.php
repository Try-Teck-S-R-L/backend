<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Delegado extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombreDelegado', 'apellidoDelegado', 'nacionalidadDelegado', 'edadDelegado',
        'correoDelegado', 'contraseniaDelegado'
    ];
}
