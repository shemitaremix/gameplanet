<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortabilidadController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/agregarPortabilidad', [PortabilidadController::class, 'agregarPortabilidad']);
Route::post('/consultarTelefono', [PortabilidadController::class, 'consultarTelelfono']);
Route::post('/consultarEstatus', [PortabilidadController::class, 'consultarEstatus']);
