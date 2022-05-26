<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('sqlsrv_edcon')->create('estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('login', 10);
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
        Schema::dropIfExists('estudiantes');
    }
}
