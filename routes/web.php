<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ChicaController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ManillaController;
use App\Http\Controllers\PiezaController;
use App\Http\Controllers\PorteriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::group( ['middleware' => 'auth'], function(){

Route::resource('users', UserController::class)->name('', 'users');

Route::post('/get-user-phone', [UserController::class, 'getUserPhone'])->name('get-user-phone');
Route::post('/get-user-chica', [ChicaController::class, 'getUserChica'])->name('get-user-chica');

Route::get('/porterias.registros', [PorteriaController::class, 'verRegistros'])->name('porterias.registros');

Route::resource('permissions', PermissionController::class);

Route::resource('roles', RoleController::class);

Route::resource('productos', ProductoController::class);

Route::resource('ventas', VentasController::class);

Route::resource('chicas', ChicaController::class);

Route::get('manillas_chicas', [ChicaController::class,'show'])->name('manillas_chicas.show');

Route::get('cambio_de_estado/chicas/{chica}/{manilla}', [ChicaController::class, 'cambio_de_estado' ])->name('cambio.estado.chicas');

Route::get('cambio_de_estado/ventas/{venta}', [VentasController::class, 'cambio_de_estado'])->name('cambio.estado.ventas');

Route::get('cambiar_estado/productos/productos/{producto}', [ProductoController::class, 'cambiar_estado'])->name('cambiar_estado');

Route::resource('piezas', PiezaController::class);

Route::resource('manillas', ManillaController::class);

Route::resource('clients', ClientController::class);

Route::resource('porterias', PorteriaController::class);

//ventas
Route::get('/shop', [CartController::class, 'shop'])->name('shop');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/save', [CartController::class, 'save'])->name('cart.save');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');

});
