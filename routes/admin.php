<?php


use App\Http\Controllers\Admin\TipoCambiosController;

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('admin.dashboard');
})->name('dashboard');


// ==============================
//  MÓDULO: TIPO DE CAMBIO
// ==============================
Route::prefix('tipo-cambio')->name('tipo-cambio.')->group(function() {

    Route::get('/', [TipoCambiosController::class, 'index'])
        ->name('index');

    Route::post('/consultar', [TipoCambiosController::class, 'consultar'])
        ->name('consultar');

});


