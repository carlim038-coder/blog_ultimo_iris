<?php
use App\Http\Controllers\PostController;

// Homepage / Lista di tutti gli oggetti creati
Route::get('/', [PostController::class, 'index'])->name('posts.index');

// Form di creazione del post
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Salvataggio nel DB
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');