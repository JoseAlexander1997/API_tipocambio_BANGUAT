<?php

namespace App\Services;

use SoapClient;
use Exception;
use Carbon\Carbon;

class TipoCambioRangoService
{
    protected $client;

    public function __construct()
    {
        $this->client = new SoapClient(
            "https://www.banguat.gob.gt/variables/ws/tipocambio.asmx?WSDL",
            ['trace' => true]
        );
    }

    /**
     * Obtiene el tipo de cambio entre 2 fechas (BANGUAT no acepta fechaFinal)
     * Se filtra en PHP
     */
    public function consultarRango($fechaInicial, $fechaFinal)
    {
        try {
            // ❗ BANGUAT SOLO ACEPTA fechainit
            $response = $this->client->TipoCambioFechaInicial([
                'fechainit' => $fechaInicial
            ]);

            $result = $response->TipoCambioFechaInicialResult->Vars->Var;

            $datos = [];

            $inicio = Carbon::createFromFormat('d/m/Y', $fechaInicial);
            $fin    = Carbon::createFromFormat('d/m/Y', $fechaFinal);

            foreach ($result as $item) {

                $fecha = Carbon::createFromFormat('d/m/Y', (string) $item->fecha);

                // 🔥 FILTRO POR RANGO EN PHP
                if ($fecha->between($inicio, $fin)) {
                    $datos[] = [
                        'fecha_tipo_cambio' => (string) $item->fecha,
                        'compra'            => (float) $item->compra,
                        'venta'             => (float) $item->venta,
                    ];
                }
            }

            return [
                'ok'     => true,
                'datos'  => $datos,
                'origen' => 'TipoCambioFechaInicial-BANGUAT'
            ];

        } catch (Exception $e) {
            return [
                'error'   => true,
                'mensaje' => $e->getMessage()
            ];
        }
    }
}
