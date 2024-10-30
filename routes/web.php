<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Route::resource('cliente', ClienteController::class)->middleware('auth');
Route::resource('proveedor', ProveedorController::class)->middleware('auth');
Route::resource('producto', ProductoController::class)->middleware('auth');
Route::resource('producto', ProductoController::class)->middleware('auth');

Route::view('/indexadmin/indexadmin','/indexadmin/indexadmin')->middleware('auth')->name('indexadmin');
Route::post('/indexadmin/indexadmin',[LoginController::class, 'login'])->name('indexadmin');
Route::get('/logout',[LoginController::class, 'logout'])->name('logout');


Route::view('/plantilla/navbar', '/plantilla/navbar');
Route::view('/plantilla/footer', '/plantilla/footer');
Route::view('/plantilla/navegacionClient', '/plantilla/navegacionClient');

Route::view('/planes/planes', '/planes/planes');

Route::view('/inventario/inventario', '/inventario/inventario');