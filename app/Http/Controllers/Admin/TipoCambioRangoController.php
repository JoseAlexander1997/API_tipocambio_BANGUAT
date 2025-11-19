<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipoCambioRango;
use App\Services\TipoCambioRangoService;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TipoCambioRangoController extends Controller
{
    public function index()
    {
        return view('admin.tipo_cambio_rango.index');
    }

    public function consultar(Request $request, TipoCambioRangoService $service)
    {
        $request->validate([
            'inicio' => 'required|date',
            'fin'    => 'required|date|after_or_equal:inicio'
        ]);

        $inicio = Carbon::parse($request->inicio)->format('d/m/Y');
        $fin    = Carbon::parse($request->fin)->format('d/m/Y');

        $respuesta = $service->consultarRango($inicio, $fin);

        if (isset($respuesta['error'])) {
            return back()->with('error', $respuesta['mensaje']);
        }

        foreach ($respuesta['datos'] as $item) {
            $fechaMySQL = Carbon::createFromFormat('d/m/Y', $item['fecha_tipo_cambio'])
                                ->format('Y-m-d');

            TipoCambioRango::create([
                'fecha_consulta'    => now(),
                'fecha_tipo_cambio' => $fechaMySQL,
                'compra'            => $item['compra'],
                'venta'             => $item['venta'],
                'origen_api'        => $respuesta['origen']
            ]);
        }

        return back()->with('exito', 'Historial consultado y almacenado correctamente.');
    }

}
