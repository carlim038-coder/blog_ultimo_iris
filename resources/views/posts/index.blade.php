<x-layout>
    <div class="container my-4">

        <!-- Messaggio di successo -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
                <div class="d-flex align-items-center">
                    <span class="fs-4 me-2">🎉</span>
                    <div>
                        <strong>Ottimo lavoro!</strong> {{ session('success') }}
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Intestazione della pagina -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 fw-bold text-dark">Tutti i Post</h1>
            
            @auth
                <a href="{{ route('posts.create') }}" class="btn btn-success shadow-sm">
                    + Crea Nuovo Post
                </a>
            @endauth
        </div>

        <!-- Lista dei post -->
        @foreach($posts as $post)
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    
                    <!-- Controllo e visualizzazione dell'immagine se esiste -->
                    @if($post->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="Immagine post" class="img-fluid rounded" style="max-height: 250px; object-fit: cover; width: 100%;">
                        </div>
                    @endif

                    <h2 class="h5 fw-bold text-primary">{{ $post->title }}</h2>
                    <p class="text-secondary">{{ $post->content }}</p>

                    <!-- Sezione inferiore con Data e Pulsanti CRUD -->
                    <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                        <small class="text-muted">Pubblicato il: {{ $post->created_at->format('d/m/Y H:i') }}</small>

                        @auth
                            <div class="d-flex align-items-center gap-2">
                                <!-- Tasto Modifica -->
                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-outline-warning btn-sm">
                                    ✏️ Modifica
                                </a>

                                <!-- Form per l'eliminazione -->
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Sei sicuro di voler eliminare questo post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        🗑️ Elimina
                                    </button>
                                </form>
                            </div>
                        @endauth
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</x-layout>