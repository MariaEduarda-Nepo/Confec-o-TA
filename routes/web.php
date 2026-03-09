<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EstoqueController;
use App\Http\Controllers\FornecedoresController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProdutosController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('clientes', ClienteController::class);
    Route::resource('estoques', EstoqueController::class);
    Route::resource('fornecedores', FornecedoresController::class);
    Route::resource('pedidos', PedidosController::class);
    Route::resource('produtos', ProdutosController::class);
});



// Rota para mostrar o formulário
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');

Route::get('/clientes/edit', [ClienteController::class, 'edit'])->name('clientes.edit');

// Rota para RECEBER os dados e salvar (POST)
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');



Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';