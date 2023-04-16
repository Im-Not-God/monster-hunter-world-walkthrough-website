<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\ArmorController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/post/delete',[PostController::class,'delete'])->name('post.delete');


// Route::view('/su', '')->middleware('SuperUser');

// Route::get('/login/su', [LoginController::class, 'showSULoginForm']);

// Route::view('/example', 'example');

// Route::get('/example/{type}', [WeaponController::class, 'getWeapon']);

// Route::view('/navigation', 'navigation');


// Route::view('/directory', 'directory');

// Route::view('/', 'home');

// Route::get('/insideExample/{id}', [ArmorController::class, 'getAmmor']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/directory/armor_list/{id}', [ArmorController::class, 'getArmor']);

Route::get('/directory/weapon_tree/{id}/detail', [WeaponController::class, 'getWeaponDetails']);

Route::get('/directory/weapon_tree/{type}', [WeaponController::class, 'getWeapon']);

Route::view('/directory', 'directory');

Route::view('/', 'home');

Route::view('/directory/monster_list', 'monster_list');
Route::view('/directory/weapon_list', 'weapon_list');
Route::view('/directory/armor_list', 'armor_list');
Route::view('/directory/skill_list', 'skill_list');
Route::view('/directory/decorations_list', 'decorations_list');
Route::view('/directory/ailment_list', 'ailment_list');

Route::get('/posts', [App\Http\Controllers\PostController::class, 'getAllPosts']);
Route::get('/posts/{id}', [App\Http\Controllers\PostController::class, 'showPostAndCommends'])->whereNumber('id');
Route::view('/post/create', 'create')->can('isAuthor', Post::class)->middleware('auth')->can('isAuthor', Post::class);
Route::post('/post/create',[App\Http\Controllers\PostController::class, 'create'])->can('isAuthor', Post::class)->middleware('auth');
Route::get('/post/edit/{id}',[App\Http\Controllers\PostController::class, 'edit'])->can('isAuthor', Post::class)->middleware('auth');
Route::post('/post/update',[App\Http\Controllers\PostController::class, 'update'])->can('isAuthor', Post::class)->middleware('auth');
Route::post('/post/delete',[PostController::class,'delete'])->name('post.delete')->middleware('auth');
Route::post('/post/comment',[PostController::class,'comment']);

Route::get('/authorize', [App\Http\Controllers\AuthorizeController::class, 'index']);
Route::get('/authorize', [App\Http\Controllers\AuthorizeController::class, 'index']);
Route::post('/authorize', [App\Http\Controllers\AuthorizeController::class, 'action']);

// Route::get('/test', [App\Http\Controllers\UserController::class, 'checkAdmin']);
Route::get('/test', [App\Http\Controllers\TestController::class, 'index']);
