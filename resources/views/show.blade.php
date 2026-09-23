<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Home Post</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                    </ol>
                </nav>

                <h1 class="fw-bold mb-3">{{ $post->title }}</h1>
                <p class="text-muted small mb-4">Pubblicato il {{ $post->created_at->format('d/m/Y H:i') }}</p>

                @if($post->image)
                    <div class="mb-4">
                        <img src="{{ Storage::url($post->image) }}" class="img-fluid rounded shadow-sm w-100" alt="{{ $post->title }}" style="max-height: 400px; object-fit: cover;">
                    </div>
                @endif

                <div class="card border-0 shadow-sm p-4 mb-4">
                    <div class="card-body">
                        <p class="fs-5" style="white-space: pre-line;">{{ $post->content }}</p>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">← Torna alla lista</a>
                    <div class="d-flex gap-2">
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Modifica Post</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Vuoi davvero eliminare questo post?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>