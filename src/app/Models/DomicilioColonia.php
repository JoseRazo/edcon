<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomicilioColonia extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv_sito';

    protected $table = 'colonia';

    protected $primaryKey = 'cve_colonia';

    protected $fillable = [
        'cve_ciudad',
        'nombre',
        'codigo_postal',
    ];

    public $timestamps = false;

    public function ciudades()
    {
        return $this->belongsTo(DomicilioCiudad::class, 'cve_ciudad', 'cve_ciudad');
    }
}
