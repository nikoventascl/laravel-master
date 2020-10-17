<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormulariosContactos extends Model
{
    protected $table = 'formularios_contactos';
    protected $fillable = [
        'tipo_consultas_id', 'descripcion', 'estado' 
        
    ];

    protected $timestamp = true;
    
    public function tipoConsulta(){
		return $this->hasOne('App\TipoConsultas', 'id', 'tipo_consultas_id');
	}     
}
