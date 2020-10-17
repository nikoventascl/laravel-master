<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    protected $table = 'eventos';
    protected $fillable = [
        'nombre', 'titulo', 'descripcion_corta', 'descripcion_larga', 'fecha_inicio', 'fecha_termino', 'hora_inicio', 'hora_termino', 'lugar', 'estado', 'color', 'tipo_eventos_id', 'user_created_id', 'user_updated_id', 'created_at', 'updated_at'
    ];
    protected $timestamp = true;

	public function tipoEvento(){
		return $this->hasOne('App\TipoEventos', 'id', 'tipo_eventos_id');
	}    
}
