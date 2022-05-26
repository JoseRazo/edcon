<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomicilioEstado extends Model
{
    use HasFactory;
    
    protected $connection = 'sqlsrv_sito';

    protected $table = 'estado';

    protected $primaryKey = 'cve_estado';

    protected $fillable = [
        'cve_pais',
        'nombre',
        'abreviatura',
    ];

    public $timestamps = false;

    public function ciudades() 
    {
        return $this->hasMany(DomicilioCiudad::class, 'cve_estado', 'cve_estado');
    }
}
