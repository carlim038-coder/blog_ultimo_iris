<x-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm p-4">
                    <h2 class="fw-bold mb-4">Modifica Post ✍️</h2>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label fw-bold">Titolo del Post</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label fw-bold">Contenuto</label>
                            <textarea class="form-control" id="content" name="content" rows="6" required>{{ old('content', $post->content) }}</textarea>
                        </div>

                        @if($post->image)
                            <div class="mb-3">
                                <label class="form-label fw-bold d-block">Immagine Attuale:</label>
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="img-thumbnail rounded" style="max-height: 150px;">
                            </div>
                        @endif

                        <div class="mb-4">
                            <label for="image" class="form-label fw-bold">Sostituisci Immagine (Opzionale)</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">Annulla</a>
                            <button type="submit" class="btn btn-success px-4">Salva Modifiche</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>