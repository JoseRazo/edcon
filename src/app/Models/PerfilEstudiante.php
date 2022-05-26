<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilEstudiante extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv_edcon';

    protected $table = 'perfil_estudiante';

    protected $fillable = [
        'estudiante_id',
        'tipo_estudiante_id',
        'estado_id', 
        'ciudad_id', 
        'colonia_id',
        'nombre', 
        'apellido_paterno', 
        'apellido_materno', 
        'calle', 
        'num_exterior', 
        'num_interior', 
        'telefono', 
        'mail',
    ];

    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function tipo_estudiante()
    {
        return $this->hasOne(TipoEstudiante::class, 'id', 'tipo_estudiante_id');
    }

    public function estado()
    {
        return $this->hasOne(DomicilioEstado::class, 'estado_id', 'cve_estado');
    }

    public function ciudad()
    {
        return $this->hasOne(DomicilioCiudad::class, 'ciudad_id', 'cve_ciudad');
    }

    public function colonia()
    {
        return $this->hasOne(DomicilioColonia::class, 'colonia_id', 'cve_colonia');
    }

    public function getNombreCompletoAttribute()
    {
        return $this->nombre . ' ' . $this->apellido_paterno . ' ' . $this->apellido_materno;
    }
}
