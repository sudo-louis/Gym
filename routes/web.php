<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProveedorController;
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

Route::resource('empleado', EmpleadoController::class);
Route::resource('cliente', ClienteController::class);
Route::resource('proveedor', ProveedorController::class);


Route::view('/plantilla/navbar', '/plantilla/navbar');
Route::view('/plantilla/footer', '/plantilla/footer');
Route::view('/plantilla/navegacionClient', '/plantilla/navegacionClient');

Route::view('/planes/planes', '/planes/planes');

Route::view('/indexadmin/indexadmin', '/indexadmin/indexadmin');

Route::view('/login/login', '/login/login');

Route::view('/producto/producto', '/producto/producto');