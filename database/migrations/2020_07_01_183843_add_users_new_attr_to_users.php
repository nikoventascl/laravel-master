<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersNewAttrToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 45)->nullable(true);
            $table->string('apellido', 45);
            $table->bigInteger('telefono');
            $table->string('rut', 20);
            $table->date('fecha_nacimiento');
            $table->bigInteger('vivienda_id')->unsigned();
            $table->bigInteger('estado')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'apellido', 'telefono', 'rut', 'fecha_nacimiento', 'vivienda_id', 'estado']);
        });
    }
}
