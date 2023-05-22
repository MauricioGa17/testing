<?php

use App\Http\Controllers\ArchivosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['cors']], function () {
    //Rutas a las que se permitirá acceso
    Route::post('/carga_archivo', [ArchivosController::class, 'carga_archivo']);
    Route::get('/descargar_archivo', [ArchivosController::class, 'descargar_archivo']);
    Route::get('/ver_archivo', [ArchivosController::class, 'ver_archivo']);
});


