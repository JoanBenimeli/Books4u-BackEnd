<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LibroController;
use App\Http\Controllers\Api\UsuarioController;
use App\Http\Controllers\Api\ComentarioController;
use App\Http\Controllers\Api\GeneroController;
use App\Http\Controllers\Api\AutorController;
use App\Http\Controllers\Api\ListaController;
use App\Http\Controllers\Api\LocalController;
use App\Http\Controllers\Api\RolController;
use App\Http\Controllers\Api\LoginController;

use App\Http\Controllers\PdfController;
use App\Mail\facturaMailable;


Route::post('login', [LoginController::class, 'login']);

Route::get('generoVerif', [GeneroController::class, 'getVerificados']);
Route::get('autoresVerif', [AutorController::class, 'getVerificados']);
Route::get('localesVerif', [LocalController::class, 'getVerificados']);

Route::apiResource('libros', LibroController::class)->only(['index', 'show']);
Route::apiResource('usuarios', UsuarioController::class)->only(['index', 'show','store']);
Route::apiResource('comentarios', ComentarioController::class)->only(['index', 'show']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [LoginController::class, 'logout']);
    Route::get('userLog', [LoginController::class, 'user']);

    Route::post('factura', [PdfController::class, 'generateAndSendPdf']);

    Route::apiResource('libros', LibroController::class)->except(['index', 'show']);
    Route::apiResource('usuarios', UsuarioController::class)->except(['index', 'show','store']);
    Route::apiResource('comentarios', ComentarioController::class)->except(['index', 'show']);
    Route::apiResource('generos', GeneroController::class);
    Route::apiResource('autores', AutorController::class)->parameters(['autores' => 'autor']);
    Route::apiResource('locales', LocalController::class)->parameters(['locales' => 'local']);
    Route::post('guardarLibro', [ListaController::class, 'guardarLibro']);
    Route::get('mostrarLista/{id}', [ListaController::class, 'mostrarLista']);
    Route::post('deleteOfLista', [ListaController::class, 'deleteOfLista']);
    Route::apiResource('locales', LocalController::class)->parameters(['locales' => 'local'])->except(['index', 'show']);
    Route::apiResource('roles', RolController::class)->parameters(['roles' => 'rol']);
});