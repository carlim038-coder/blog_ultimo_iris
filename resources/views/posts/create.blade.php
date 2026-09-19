<x-layout>
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h4 fw-bold text-dark mb-0">Crea un Nuovo Post</h1>
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary btn-sm">⬅ Torna alla lista</a>
            </div>

            <!-- 1. NOTA: Aggiunto enctype="multipart/form-data" qui sotto -->
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Titolo -->
                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Titolo del Post</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Inserisci un titolo..." required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Contenuto -->
                <div class="mb-3">
                    <label for="content" class="form-label fw-semibold">Contenuto</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="6" placeholder="Scrivi qualcosa..." required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- 2. NUOVO CAMPO AGGIUNTO: Immagine -->
                <div class="mb-3">
                    <label for="image" class="form-label fw-semibold">Immagine di Copertina</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                    <div class="form-text">Formati accettati: JPEG, PNG, JPG, WEBP (Max 2MB).</div>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Pulsante Submit -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg shadow-sm">Salva Post</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>