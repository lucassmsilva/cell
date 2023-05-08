<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CelulaController;
use App\Http\Controllers\PredioController;
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
    Route::resource('users', 'App\Http\Controllers\UserController')->only(['index', 'store', 'update', 'destroy']);
    Route::resource('celulas', 'App\Http\Controllers\CelulaController')->only(['index', 'store', 'update', 'destroy']);
    Route::resource('predios', 'App\Http\Controllers\PredioController')->only(['index', 'store', 'update', 'destroy']);
});

