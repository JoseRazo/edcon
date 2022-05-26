<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sqlsrv_edcon')->create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 60);
            $table->string('apellido_paterno', 40)->nullable();
            $table->string('apellido_materno', 40)->nullable();
            $table->string('email', 60)->unique();
            $table->string('password');
            $table->boolean('activo')->default(1);
            $table->timestamp('fecha_creacion');
            $table->timestamp('fecha_actualizacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
