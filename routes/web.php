<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/jogo/criar', [App\Http\Controllers\GameController::class, 'create'])->name('create.game');
Route::get('/jogo/listar', [App\Http\Controllers\GameController::class, 'view'])->name('view.game');
Route::get('/jogo/todos', [App\Http\Controllers\GameController::class, 'list'])->name('list.game');
Route::get('/jogo/partida/{game_id}', [App\Http\Controllers\GameController::class, 'show'])->name('show.game');
Route::get('/jogo/{game_id}', [App\Http\Controllers\GameController::class, 'join'])->name('join.game');

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('index.user');
Route::get('/users/admin', [App\Http\Controllers\UserController::class, 'showRole'])->name('showRole.user');
Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('show.user');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroy.user');

Route::post('/game/store', [App\Http\Controllers\GameController::class, 'store'])->name('store.game');




