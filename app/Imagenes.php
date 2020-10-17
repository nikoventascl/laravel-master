<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    protected $table = 'imagenes';
    protected $fillable = [
        'nombre', 'tipo', 'extension', 'portada', 'estado', 'created_at', 'updated_at', 'relacion_id' 
    ];
    protected $timestamp = true;

    public static function grabarImagen($imagen,$pantalla){
        $pantalla = "{{ route('noticias.create') }}";

        if($pantalla == "{{ route('noticias.create') }}" ){

            $ruta = storage_path().'/imagenes/noticias/temp/';

        }else if($pantalla == "{{ route('usuarios.create') }}"){

            $ruta = storage_path().'/imagenes/usuarios/temp/';

        }else{
            
            $ruta = storage_path().'/imagenes/viviendas/temp/';
        }
    }


}
