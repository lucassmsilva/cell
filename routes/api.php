<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CelulaController;
use App\Http\Controllers\PredioController;
use App\Http\Controllers\CelulaRelatorioController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function (){
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });
    Route::post('users/store', [UserController::class, 'store']);
    Route::get('users/index', [UserController::class, 'index']);
    Route::put('users/update/{id}', [UserController::class, 'update']);
    Route::delete('users/destroy/{id}', [UserController::class, 'destroy']);

    Route::post('celulas/store', [CelulaController::class, 'store']);
    Route::get('celulas/index', [CelulaController::class, 'index']);
    Route::put('celulas/update/{id}', [CelulaController::class, 'update']);
    Route::delete('celulas/destroy/{id}', [CelulaController::class, 'destroy']);

    Route::post('predios/store', [PredioController::class, 'store']);
    Route::get('predios/index', [PredioController::class, 'index']);
    Route::put('predios/update/{id}', [PredioController::class, 'update']);
    Route::delete('predios/destroy/{id}', [PredioController::class, 'destroy']);


    Route::post('relatorios/store', [CelulaRelatorioController::class, 'store']);
    Route::get('relatorios/index', [CelulaRelatorioController::class, 'index']);
    Route::put('relatorios/update/{id}', [CelulaRelatorioController::class, 'update']);
    Route::delete('relatorios/destroy/{id}', [CelulaRelatorioController::class, 'destroy']);
});

