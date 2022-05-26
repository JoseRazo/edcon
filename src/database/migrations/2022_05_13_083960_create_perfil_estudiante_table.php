<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerfilEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sqlsrv_edcon')->create('perfil_estudiante', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('estudiante_id');
            $table->unsignedBigInteger('tipo_estudiante_id');
            $table->integer('estado_id');
            $table->integer('ciudad_id');
            $table->integer('colonia_id');
            $table->string('nombre', 60);
            $table->string('apellido_paterno', 40)->nullable();
            $table->string('apellido_materno', 40)->nullable();
            $table->string('calle', 60);
            $table->string('num_exterior', 15)->nullable();
            $table->string('num_interior', 15)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('mail', 60)->nullable();
            $table->timestamp('fecha_creacion');
            $table->timestamp('fecha_actualizacion');
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
            $table->foreign('tipo_estudiante_id')->references('id')->on('tipo_estudiante')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfil_estudiante');
    }
}
