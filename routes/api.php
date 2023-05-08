<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

    Route::get('users/index', [UserController::class, 'index']);
    Route::post('users/tore', [UserController::class, 'store']);
    Route::put('users/{id}/update', [UserController::class, 'update']);
});

