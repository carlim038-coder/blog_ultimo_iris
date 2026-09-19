<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    // Mostra l'elenco dei post (Home del blog)
    public function index()
    {
        $posts = Post::latest()->get(); // Prende tutti i post dal più recente
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
        // 1. Regole di validazione
        $validatedData = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // 2. Controllo e salvataggio dell'immagine
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('posts', 'public');
            $validatedData['image'] = $path;
        }

        // 3. Salvataggio effettivo nel Database
        Post::create($validatedData);

        // 4. Reindirizzamento alla lista con il messaggio di successo in stile Aulab
        return redirect()->route('posts.index')->with('success', 'Il post è stato creato correttamente!');
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