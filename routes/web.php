<?php

use App\Http\Controllers\LivreController;
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

Route::get('/', [LivreController::class, 'index'])->name('livre.index');
Route::get('/creer-livre', [LivreController::class, 'create'])->name('livre.create');
Route::post('/store-livre', [LivreController::class, 'store'])->name('livre.store');
Route::get('/edit-livre/{id}', [LivreController::class, 'edit'])->name('livre.edit');
Route::put('/update-livre/{id}', [LivreController::class, 'update'])->name('livre.update');
Route::delete('/delete-livre/{id}', [LivreController::class, 'delete'])->name('livre.delete');
