<?php

use App\Http\Controllers\AdminsController;
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
Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Route::resource('cliente', ClienteController::class)->middleware('auth');
Route::resource('proveedor', ProveedorController::class)->middleware('auth');
Route::resource('producto', ProductoController::class)->middleware('auth');
Route::resource('categoria', CategoriaController::class)->middleware('auth');
Route::delete('/admin/{admin}', [AdminsController::class, 'destroy'])->name('admin.destroy')->middleware('auth');

//Login para empleados
Route::get('/indexadmin/indexadmin', function () {
    return view('/indexadmin/indexadmin');
})->middleware('auth')->name('indexadmin');
Route::post('/indexadmin/indexadmin',[LoginController::class, 'login'])->name('indexadmin');
Route::middleware(['web'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

//Login para Admins
Route::view('admins/login', '/admins/login');
Route::post('/admins/index', [AdminsController::class, 'login'])->name('admins.login');

Route::middleware(['auth.custom'])->group(function () {
    Route::view('/admins/index', '/admins/index');
    Route::resource('empleado', EmpleadoController::class);
    Route::resource('cliente', ClienteController::class);
    Route::resource('proveedor', ProveedorController::class);
    Route::resource('producto', ProductoController::class);
    Route::resource('categoria', CategoriaController::class);

    Route::get('/admin/index', [AdminsController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminsController::class, 'create'])->name('admin.create');
    Route::post('/admin', [AdminsController::class, 'store'])->name('admin.store');
    Route::get('/admin/{admin}/edit', [AdminsController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{admin}', [AdminsController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{admin}', [AdminsController::class, 'destroy'])->name('admin.destroy');
});

Route::view('/plantilla/navbar', '/plantilla/navbar');
Route::view('/plantilla/navbarAdmins', '/plantilla/navbarAdmins');
Route::view('/plantilla/footer', '/plantilla/footer');