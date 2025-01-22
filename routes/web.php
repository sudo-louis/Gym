<?php

use App\Http\Controllers\CategoriaController;
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
//Operaciones CRUDS
Route::get('/', function () {
    return view('welcome');
});

//INICIO DE SESIÓN CON TABLA ADMINS
Route::post('/indexadmin/indexadmin', [LoginController::class, 'login'])->name('login');

Route::middleware(['auth.custom'])->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/indexadmin/indexadmin', function () {
        return view('/indexadmin/indexadmin');
    })->name('indexadmin');
    Route::resource('empleado', EmpleadoController::class);
    Route::resource('cliente', ClienteController::class);
    Route::resource('proveedor', ProveedorController::class);
    Route::resource('producto', ProductoController::class);
    Route::resource('categoria', CategoriaController::class);
});

Route::view('/plantilla/navbar', '/plantilla/navbar');
Route::view('/plantilla/navbarAdmins', '/plantilla/navbarAdmins');
Route::view('/plantilla/footer', '/plantilla/footer');
