<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\ArmorControllers;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/example', 'example');
Route::view('/directory/weapon_list', 'weapon_list');

Route::get('/insideExample/{id}', [ArmorControllers::class, 'getAmmor']);

Route::get('/insideWeapon/{id}', [WeaponController::class, 'getWeaponDetails']);

Route::view('/navigationBar', 'navigationBar');

Route::get('/example/{type}', [WeaponController::class, 'getWeapon']);

Route::get('/directory/weapon_tree/{type}', [WeaponController::class, 'getWeapon']);

Route::view('/directory', 'directory');

Route::view('/', 'home');
