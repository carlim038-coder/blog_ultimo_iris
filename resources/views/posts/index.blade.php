<x-layout>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-dark fw-bold">Tutti i Post</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-success shadow-sm">
            ➕ Crea Nuovo Post
        </a>
    </div>

    @if(count($posts) > 0)
        <div class="row">
            @foreach($posts as $post)
                <div class="col-12 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title h5 text-primary fw-bold">{{ $post->title }}</h3>
                            <p class="card-text text-secondary">{{ $post->content }}</p>
                            <div class="text-end">
                                <small class="text-muted">Pubblicato il: {{ $post->created_at->format('d/m/Y H:i') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info text-center shadow-sm" role="alert">
            Non ci sono post disponibili al momento. Creane uno adesso!
        </div>
    @endif
</x-layout>