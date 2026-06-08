<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::resource('clientes', ClientesController::class);
});

require __DIR__.'/settings.php';
