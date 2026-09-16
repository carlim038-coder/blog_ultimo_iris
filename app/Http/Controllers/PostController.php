<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Mostra tutti gli oggetti creati (Homepage / Lista)
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    // Mostra il form di creazione
    public function create()
    {
        return view('posts.create');
    }

    // Salva il nuovo oggetto nel database
    public function store(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        // Salvataggio nel DB
        Post::create($request->all());

        // Reindirizzamento alla pagina con tutti gli oggetti
        return redirect()->route('posts.index');
    }
}