<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEventos extends Model
{
    protected $table = 'tipo_eventos';
    protected $fillable = [
        'nombre', 'estado'
    ];
    protected $timestamp = true;
}
