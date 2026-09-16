<x-layout>
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h4 fw-bold text-dark mb-0">Crea un Nuovo Post</h1>
                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary btn-sm">⬅ Torna alla lista</a>
            </div>

            <form action="{{ route('posts.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label fw-semibold">Titolo del Post</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci un titolo..." required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label fw-semibold">Contenuto</label>
                    <textarea class="form-control" id="content" name="content" rows="6" placeholder="Scrivi qualcosa..." required></textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg shadow-sm">Salva Post</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>