<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;
    protected $fillable = ['idUser','idAdministrador','nombreAdministrador','correoAdministrador','contraseniaAdministrador'];
}
