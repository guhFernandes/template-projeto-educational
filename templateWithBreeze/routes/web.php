<?php

use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', [NoticiaController::class, 'viewDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/editar/noticia', [NoticiaController::class, 'viewEditar'])->middleware(['auth', 'verified']);
Route::post('/adicionar/noticia',[NoticiaController::class, 'adicionarFuncionario'])->middleware(['auth', 'verified']);
Route::post('atualizar/noticia',[NoticiaController::class, 'atualizarFuncionario'])->middleware(['auth', 'verified']);
Route::get('/deletar/noticia',[NoticiaController::class, 'deletarFuncionario'])->middleware(['auth', 'verified']);


require __DIR__.'/auth.php';
