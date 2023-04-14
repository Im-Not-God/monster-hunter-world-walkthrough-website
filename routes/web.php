<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\ArmorControllers;
use App\Http\Controllers\PostController;
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

Route::view('/directory/monster_list', 'monster_list');
Route::view('/directory/weapon_list', 'weapon_list');
Route::view('/directory/ammor_list', 'ammor_list');
Route::view('/directory/skill_list', 'skill_list');
Route::view('/directory/decorations_list', 'decorations_list');
Route::view('/directory/ailment_list', 'ailment_list');

Route::get('/directory/ammor_list/{id}', [ArmorControllers::class, 'getAmmor']);

Route::get('/directory/weapon_tree/{id}/detail', [WeaponController::class, 'getWeaponDetails']);

Route::view('/navigationBar', 'navigationBar');

Route::get('/example/{type}', [WeaponController::class, 'getWeapon']);

Route::get('/directory/weapon_tree/{type}', [WeaponController::class, 'getWeapon']);

Route::view('/directory', 'directory');

Route::view('/', 'home');

Route::get('/posts', [App\Http\Controllers\PostController::class, 'getAllPosts']);
Route::get('/posts/{id}', [App\Http\Controllers\PostController::class, 'showPost']);
Route::get('/authorize', [App\Http\Controllers\AuthorizeController::class, 'getAllUsers']);
Route::view('/post/create', 'create')->can('isAuthor', Post::class);
Route::post('/post/create',[App\Http\Controllers\PostController::class, 'create']);
Route::post('/post/delete',[PostController::class,'delete'])->name('post.delete');
Route::get('/post/edit/{id}',[App\Http\Controllers\PostController::class, 'edit'])->can('isAuthor', Post::class);
Route::post('/post/update',[App\Http\Controllers\PostController::class, 'update']);
