<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\AuteurController;

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

Route::middleware('auth')->group(function () {
  Route::get('/', [LivreController::class, 'index'])->name('livre.index');
  Route::get('/creer-livre', [LivreController::class, 'create'])->name('livre.create');
  Route::post('/store-livre', [LivreController::class, 'store'])->name('livre.store');
  Route::get('/edit-livre/{id}', [LivreController::class, 'edit'])->name('livre.edit');
  Route::put('/update-livre/{id}', [LivreController::class, 'update'])->name('livre.update');
  Route::delete('/delete-livre/{id}', [LivreController::class, 'delete'])->name('livre.delete');

  Route::get('/list-auteurs', [AuteurController::class, 'index'])->name('auteur.index');
  Route::get('/creer-auteur', [AuteurController::class, 'create'])->name('auteur.create');
  Route::post('/store-auteur', [AuteurController::class, 'store'])->name('auteur.store');
  Route::get('/edit-auteur/{id}', [AuteurController::class, 'edit'])->name('auteur.edit');
  Route::put('/update-auteur/{id}', [AuteurController::class, 'update'])->name('auteur.update');
  Route::delete('/delete-auteur/{id}', [AuteurController::class, 'delete'])->name('auteur.delete');

  Route::get('/profile', [UserController::class, 'index'])->name('profile');
});


Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login-user', [UserController::class, 'loginUser'])->name('login.user');
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register-user', [UserController::class, 'registerUser'])->name('register.user');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');