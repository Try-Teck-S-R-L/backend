<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jugador extends Model
{
    use HasFactory;
    protected $fillable = [
        'ciJugador', 'nombreJugador', 'apellidoJugador', 'numeroCamiseta', 'edadJugador', 'fotoPerfilJugador',
        'fotoCiJugador', 'nacionalidadJugador', 'posicionJugador', 'tallaJugador', 'idEquipo' //, 'idCategoria'
    ];
}
