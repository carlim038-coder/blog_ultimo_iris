<x-layout>
    <!-- Hero Section a tema Tennis -->
    <div class="p-5 mb-4 bg-light rounded-3 shadow-sm border-0 position-relative overflow-hidden" style="background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1595435934249-5df7ed86e1c0?q=80&w=1200&auto=format&fit=crop') no-repeat center center; background-size: cover; color: white;">
        <div class="container-fluid py-5 text-center">
            <span class="badge bg-success mb-3 px-3 py-2 text-uppercase tracking-wider">Blog Ufficiale</span>
            <h1 class="display-4 fw-bold mb-3">Passione Tennis 🎾</h1>
            <p class="col-md-8 mx-auto fs-5 mb-4">
                Cronache, colpi di classe, racchette e storie direttamente dai campi di terra rossa, erba e cemento. Unisciti alla community e scopri tutti i post!
            </p>
            <div class="d-flex justify-content-center gap-3">
                <a href="{{ route('posts.index') }}" class="btn btn-primary btn-lg px-4 shadow">
                    Esplora i Post
                </a>
                <a href="{{ route('posts.create') }}" class="btn btn-outline-light btn-lg px-4">
                    Scrivi un Post
                </a>
            </div>
        </div>
    </div>

    <!-- Sezione informativa secondaria -->
    <div class="row text-center my-5">
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100 p-3">
                <div class="card-body">
                    <div class="fs-1 mb-2">🏆</div>
                    <h3 class="h5 fw-bold">Tornei & Grand Slam</h3>
                    <p class="text-muted small">Segui gli aggiornamenti sui tornei più importanti del circuito internazionale.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100 p-3">
                <div class="card-body">
                    <div class="fs-1 mb-2">⚡</div>
                    <h3 class="h5 fw-bold">Tecnica & Racchette</h3>
                    <p class="text-muted small">Consigli sui colpi, impugnature, corde e attrezzatura ideale per migliorare il tuo gioco.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm h-100 p-3">
                <div class="card-body">
                    <div class="fs-1 mb-2">✍️</div>
                    <h3 class="h5 fw-bold">La tua opinione</h3>
                    <p class="text-muted small">Crea il tuo profilo, carica le immagini dei tuoi match e condividi le tue passioni.</p>
                </div>
            </div>
        </div>
    </div>
</x-layout>