<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEstados extends Model
{
    protected $table = 'tipo_estados';
    protected $fillable = [
        'nombre'
    ];
    protected $timestamp = true;
}
