<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    // Route::get('role',[RoleController::class,'index']);
    // Route::get('role/{id}',[RoleController::class,'show']);
    // Route::post('role',[RoleController::class,'store']);
    // Route::put('role/{id}',[RoleController::class,'update']);
    // Route::delete('role/{id}',[RoleController::class,'destroy']);

    Route::apiResource('role', RoleController::class);
