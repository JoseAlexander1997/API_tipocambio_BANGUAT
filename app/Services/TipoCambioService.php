<?php

namespace App\Services;

use SoapClient;
use Exception;

class TipoCambioService
{
    protected $client;

    public function __construct()
    {
        $this->client = new SoapClient(
            "https://www.banguat.gob.gt/variables/ws/tipocambio.asmx?WSDL", //consumimos la api tipo de cambio del día
            ['trace' => true]
        );
    }

    public function obtenerTipoCambioDia()
    {
        try {
            $response = $this->client->TipoCambioDia();

            $varDolar = $response->TipoCambioDiaResult->CambioDolar->VarDolar; 
            //Parseamos el XML que obtenemos 

            return [
                'fecha' => (string) $varDolar->fecha,
                'tipo_cambio' => (float) $varDolar->referencia,
                'origen' => 'TipoCambioDia-BANGUAT'
            ];

        } catch (Exception $e) {
            //Si ocurre algun error, nos muestra notificacion de error en pantalla
            return [
                'error' => true,
                'mensaje' => $e->getMessage()
            ];
        }
    }

}
