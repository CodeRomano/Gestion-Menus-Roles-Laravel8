<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\MenuRolController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function(){
    return view('auth.login');
});

Route::resource('menu', MenuController::class);
Route::resource('rol', RolController::class);


Route::get('/menuNuevo', [App\Http\Controllers\MenuController::class, 'createMenu']);
Route::get('/submenuNuevo/{idMenu}', [App\Http\Controllers\MenuController::class, 'createSubMenu']);
Route::get('/itemNuevo/{idSubMenu}', [App\Http\Controllers\MenuController::class, 'createItem']);

