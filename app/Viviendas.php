<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Viviendas extends Model
{
    protected $table = 'viviendas';
    protected $fillable = [
        'direccion', 'jefe_hogar', 'cantidad_habitantes', 'estado'
    ];
    protected $timestamp = true;
}
