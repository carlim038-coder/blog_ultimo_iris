<?php

use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

// Questa singola riga sostituisce tutte le rotte dei post!
Route::resource('posts', PostController::class);