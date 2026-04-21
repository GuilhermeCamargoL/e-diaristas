<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\DiaristaApiController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LoginController::class, 'showLoginForm']);

Route::get('/api/docs/openapi.yaml', function () {
    return response(
        file_get_contents(base_path('docs/openapi.yaml')),
        200,
        ['Content-Type' => 'application/yaml; charset=UTF-8']
    );
})->name('api.docs.spec');

Route::get('/api/docs', function () {
    return view('api_docs');
})->name('api.docs');

Auth::routes(['register' => false]);

Route::middleware('auth')->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('usuarios', UsuarioController::class);

    // Rotas de serviços
    Route::resource('servicos', ServicoController::class)->except(['show', 'destroy']);

    // Espelho de diaristas cadastradas externamente via API
    Route::get('/diaristas-api', [DiaristaApiController::class, 'index'])->name('diaristas_api.index');
});


