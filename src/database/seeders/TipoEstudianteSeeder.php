<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TipoEstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('sqlsrv_edcon')->table('tipo_estudiante')->insert([
            'nombre' => 'Estudiante UTS',
            'fecha_creacion' => Carbon::now(),
            'fecha_actualizacion' => Carbon::now(),
        ]);

        DB::connection('sqlsrv_edcon')->table('tipo_estudiante')->insert([
            'nombre' => 'Egresado UTS',
            'fecha_creacion' => Carbon::now(),
            'fecha_actualizacion' => Carbon::now(),
        ]);

        DB::connection('sqlsrv_edcon')->table('tipo_estudiante')->insert([
            'nombre' => 'Personal Externo',
            'fecha_creacion' => Carbon::now(),
            'fecha_actualizacion' => Carbon::now(),
        ]);
    }
}
