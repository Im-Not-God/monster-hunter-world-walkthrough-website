<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\AuthorizeController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::view('/', 'home');

Route::get('/directory/armor_list/{id}', [DirectoryController::class, 'getArmorDetail']);
Route::get('/directory/weapon_tree/{id}/detail', [DirectoryController::class, 'getWeaponDetail']);
Route::get('/directory/weapon_tree/{type}', [DirectoryController::class, 'getWeapon']);
Route::view('/directory', 'directory');
Route::get('/directory/monster_list', [DirectoryController::class, 'getMonsterList']);
Route::view('/directory/weapon_list', 'weapon_list');
Route::get('/directory/armor_list', [DirectoryController::class, 'getArmorList']);
Route::get('/directory/skill_list', [DirectoryController::class, 'getSkillList']);
Route::get('/directory/decorations_list', [DirectoryController::class, 'getDecorationList']);
Route::get('/directory/ailment_list', [DirectoryController::class, 'getAilmentList']);

Route::get('/posts', [PostController::class, 'getAllPosts']);
Route::get('/posts/{id}', [PostController::class, 'showPostAndCommends'])->whereNumber('id');
Route::post('/post/view',[PostController::class,'view']);

//only author
Route::view('/post/create', 'editor')->can('isAuthor', Post::class)->middleware('auth')->can('isAuthor', Post::class);
Route::post('/post/create',[PostController::class, 'create'])->can('isAuthor', Post::class)->middleware('auth');

//only post's author
Route::get('/post/edit/{id}',[PostController::class, 'edit'])->can('isAuthor', Post::class)->middleware('auth');
Route::post('/post/update',[PostController::class, 'update'])->can('isAuthor', Post::class)->middleware('auth');

//only post's author, admin and su
Route::post('/post/delete',[PostController::class,'delete'])->name('post.delete')->middleware('auth');

//except guest
Route::post('/post/comment',[PostController::class,'comment']);

//only admin and su
Route::get('/authorize', [AuthorizeController::class, 'index'])->middleware('authorize');;
Route::post('/authorize', [AuthorizeController::class, 'action']);
