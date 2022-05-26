<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomicilioCiudad extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv_sito';

    protected $table = 'ciudad';

    protected $primaryKey = 'cve_ciudad';

    protected $fillable = [
        'cve_estado',
        'nombre',
        'lada',
    ];

    public $timestamps = false;

    public function estados()
    {
        return $this->belongsTo(DomicilioEstado::class, 'cve_estado', 'cve_estado');
    }

    public function colonias() 
    {
        return $this->hasMany(DomicilioColonia::class, 'cve_ciudad', 'cve_ciudad');
    }
}
