<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoCambio extends Model
{
    protected $table = 'tipocambios';

    protected $fillable = [
        'fecha_consulta',
        'fecha_tipo_cambio',
        'tipo_cambio',
        'origen_api'
    ];
}
