<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    protected $table = 'noticias';
    protected $fillable = [
        'titulo', 'descripcion_corta', 'descripcion_larga', 'estado', 'user_created_id', 'user_updated_id', 'created_at', 'updated_at'
    ];
    protected $timestamp = true;  
    
    public function users(){
        return $this->hasOne('App\User', 'id', 'user_created_id');
    }   
}
