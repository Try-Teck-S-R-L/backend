<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delegados extends Model
{
    use HasFactory;
    protected $fillable = [
        'idDelegado', 'nombreDelegado', 'correoDelegado'

    ];
}
