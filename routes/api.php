<?php
use App\Http\Controllers\SillaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::get('/silla', [SillaController::class, 'show']);
Route::post('/crear', [SillaController::class, 'store']);
Route::delete('/eliminar/{id}', [SillaController::class, 'destroy']);
Route::put('/editar/{id}', [SillaController::class, 'edit']);