<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEstudiante extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv_edcon';

    protected $table = 'tipo_estudiante';

    protected $fillable = [
        'nombre',
    ];

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';
}
