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
Route::get('/debug', [App\Http\Controllers\HomeController::class, 'show'])->name('show.home');

Route::get('/jogo/listar', [App\Http\Controllers\GameController::class, 'index'])->name('index.game');
Route::get('/jogo/criar', [App\Http\Controllers\GameController::class, 'create'])->name('create.game');
Route::post('/jogo/guardar', [App\Http\Controllers\GameController::class, 'store'])->name('store.game');
// Route::get('/jogo/todos', [App\Http\Controllers\GameController::class, 'show'])->name('show.game');

// Pivot GAME-USER
Route::get('round/listar', [App\Http\Controllers\GameUserController::class, 'index'])->name('index.round');
Route::get('round/criar/{game_id}', [App\Http\Controllers\GameUserController::class, 'create'])->name('create.round');
Route::get('round/entrar', [App\Http\Controllers\GameUserController::class, 'store'])->name('store.round');
Route::get('round/{game_id}', [App\Http\Controllers\GameUserController::class, 'show'])->name('show.round');
Route::post('round/editar', [App\Http\Controllers\GameUserController::class, 'update'])->name('update.round');

// Economy
Route::put('/economia', [App\Http\Controllers\EconomyController::class, 'changeTax'])->name('update.economy');

// USERS
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('index.user');
Route::get('/users/admin', [App\Http\Controllers\UserController::class, 'showRole'])->name('showRole.user');
Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('show.user');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroy.user');
