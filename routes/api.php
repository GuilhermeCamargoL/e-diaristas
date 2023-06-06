<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', App\Http\Controllers\IndexController::class);


Route::get('/diaristas/localidades', App\Http\Controllers\Diarista\ObtemDiaristasPorCEP::class)->name('diaristas.busca_por_cep');

Route::get('/diaristas/disponibilidade', App\Http\Controllers\Diarista\VerificaDisponibilidade::class)->name('enderecos.disponibilidade');
Route::get('/enderecos', App\Http\Controllers\Endereco\BuscaCepApiExterna::class)->name('enderecos.cep');

Route::get('/servicos', App\http\Controllers\Servico\ObtemServicos::class)->name('servicos.index');

