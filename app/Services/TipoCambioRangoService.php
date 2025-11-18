<?php

namespace App\Services;

use SoapClient;
use Exception;

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
     * Consulta un rango de tipo de cambio
     *
     * @param string $fechaInicial formato d/m/Y
     * @param string $fechaFinal formato d/m/Y
     * @return array
     */
    public function consultarRango($fechaInicial, $fechaFinal)
    {
        try {
            $response = $this->client->TipoCambioFechaInicial([
                'fechainit' => $fechaInicial,
                'fechafinal'=> $fechaFinal
            ]);

            $result = $response->TipoCambioFechaInicialResult->Vars->Var;

            $datos = [];
            foreach ($result as $item) {
                $datos[] = [
                    'fecha_tipo_cambio' => (string) $item->fecha,
                    'compra'            => (float) $item->compra,
                    'venta'             => (float) $item->venta,
                ];
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
