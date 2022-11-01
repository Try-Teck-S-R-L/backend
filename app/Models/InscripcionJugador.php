<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcionjugador extends Model
{
    use HasFactory;
    protected $fillable = [
        "ciJugador", "categoria", "nombresJugador", "apellidosJugador", "nacionalidadJugador", "tallaJugador",
        "nroCamisetaJugador", "edadJugador", "posicionJugador"
    ];
}
