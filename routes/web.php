<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\LocacoesController;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::resource('clientes', ClientesController::class);
    Route::resource('produtos',ProdutosController::class);
    Route::resource('locacoes',LocacoesController::class)
        ->parameters(['locacoes' => 'locacao']);
});

require __DIR__.'/settings.php';
