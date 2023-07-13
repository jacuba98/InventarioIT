<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;

    protected $fillable = ['no_equipo', 'estado', 'equipo', 'marca', 'modelo', 'no_serie', 'nombre_equipo', 'ip_equipo', 'no_contrato'];
}
