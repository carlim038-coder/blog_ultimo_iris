<x-layout>
    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm p-4">
                    <h1 class="h3 fw-bold mb-4">Modifica Post</h1>

                    <!-- Mostra errori di validazione -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label fw-semibold">Titolo</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label fw-semibold">Contenuto</label>
                            <textarea class="form-control" id="content" name="content" rows="5" required>{{ old('content', $post->content) }}</textarea>
                        </div>

                        @if($post->image)
                            <div class="mb-3">
                                <label class="form-label fw-semibold d-block">Immagine Attuale</label>
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Immagine post" class="img-fluid rounded mb-2" style="max-height: 150px; object-fit: cover;">
                            </div>
                        @endif

                        <div class="mb-4">
                            <label for="image" class="form-label fw-semibold">Sostituisci Immagine (opzionale)</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Annulla</a>
                            <button type="submit" class="btn btn-primary">Salva Modifiche</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>