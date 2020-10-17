<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoConsultas extends Model
{
    protected $table = 'tipo_consultas';
    protected $fillable = [
        'nombre', 'estado'
    ];
    protected $timestamp = true;
}
