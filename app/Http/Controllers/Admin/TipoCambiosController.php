<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipoCambio;
use App\Services\TipoCambioService;
use Carbon\Carbon;


class TipoCambiosController extends Controller
{
    public function index()
    {
        $ultimos = TipoCambio::latest()
            ->take(5)
            ->get();
        $ultimo  = TipoCambio::latest()->first(); // <-- aquí obtenemos el último registro


        return view('admin.tipo_cambio.index', compact('ultimos','ultimo'));
    }

    public function consultar(TipoCambioService $service)
    {
        $resultado = $service->obtenerTipoCambioDia();

        if (isset($resultado['error'])) {
            return back()->with('error', $resultado['mensaje']);
        }

        // Convertir fecha a formato MySQL
        $fechaMySQL = Carbon::createFromFormat('d/m/Y', $resultado['fecha'])->format('Y-m-d');

        TipoCambio::create([
            'fecha_consulta'   => now(),
            'fecha_tipo_cambio'=> $fechaMySQL,
            'tipo_cambio'      => $resultado['tipo_cambio'],
            'origen_api'       => $resultado['origen']
        ]);

        return redirect()->route('admin.tipo-cambio.index')
                        ->with('exito', 'Consulta realizada correctamente.');
    }
}
