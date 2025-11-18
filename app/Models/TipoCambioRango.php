<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCambioRango extends Model
{
    protected $table = 'tipo_cambio_rango';

    protected $fillable = [
        'fecha_consulta',
        'fecha_tipo_cambio',
        'compra',
        'venta',
        'origen_api',
    ];
}
