<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    protected $table = 'estados';
    protected $fillable = [
        'nombre', 'estado', 'tipo_estado_id'
    ];
    protected $timestamp = true;
}
