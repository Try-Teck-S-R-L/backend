<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jugador extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombreJugador', 'apellidoJugador', 'numeroCamiseta', 'categoria',
        'edadJugador', 'fotoPerfilJugador',
        'fotoCiJugador',
        'nacionalidadJugador', 'posicionJugador', 'tallaJugador'
    ];
}
