<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Il costruttore protegge le rotte richiedendo l'autenticazione
    public function __construct()
    {
        // Chiunque può vedere la lista (index) e il dettaglio (show),
        // ma per creare, modificare o eliminare bisogna essere loggati
        $this->middleware('auth')->except(['index', 'show']);
    }

    // Mostra l'elenco dei post (Home del blog)
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    // Mostra la vista con il form di creazione
    public function create()
    {
        return view('posts.create');
    }

    // Gestisce la validazione e il salvataggio nel DB (inclusa l'immagine)
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $validatedData['image'] = $path;
        }

        Post::create($validatedData);

        return redirect()->route('posts.index')->with('success', 'Il post è stato creato correttamente!');
    }

    // Mostra il dettaglio del singolo post
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // Mostra il form di modifica pre-compilato con i dati del post
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // Gestisce la validazione e l'aggiornamento dei dati nel DB
    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $path = $request->file('image')->store('posts', 'public');
            $validatedData['image'] = $path;
        }

        $post->update($validatedData);

        return redirect()->route('posts.index')->with('success', 'Il post è stato aggiornato correttamente!');
    }

    // Elimina il post dal database (e rimuove l'immagine associata se esiste)
    public function destroy(Post $post)
    {
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post eliminato con successo!');
    }
}