<?php
use App\Http\Controllers\PostController;
Route::get('/', function () {
    return view('welcome');
});
// Rotta per la lista dei post (importante per il pulsante "Torna alla lista")
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// Rotta per il form di creazione
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Rotta per il salvataggio dei dati
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
// Elimina un post specifico tramite il suo ID
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');