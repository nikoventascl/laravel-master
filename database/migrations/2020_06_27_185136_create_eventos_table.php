<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 45)->nullable(true);
            $table->string('titulo', 20);
            $table->string('descripcion_corta', 200);
            $table->string('descripcion_larga', 5000);
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->time('hora_inicio');
            $table->time('hora_termino');
            $table->string('lugar', 50);
            $table->bigInteger('estado')->unsigned();
            $table->bigInteger('tipo_eventos_id')->unsigned();
            $table->bigInteger('user_created_id')->unsigned();
            $table->bigInteger('user_updated_id')->unsigned()->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
