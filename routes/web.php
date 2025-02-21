<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('plantilla.app');
});

Route::resource('categorias',CategoriaController::class);