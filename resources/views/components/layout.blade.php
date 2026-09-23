<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Il mio Blog' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">

    <!-- Navbar principale -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">📚 Esercizio Blog</a>
            
            <!-- Tasto toggle per dispositivi mobili -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    @auth
                        <!-- Se l'utente è LOGGATO -->
                        <li class="nav-item me-3">
                            <span class="text-white">Benvenuto, <strong>{{ Auth::user()->name }}</strong></span>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                            </form>
                        </li>
                    @else
                        <!-- Se l'utente NON è loggato -->
                        <li class="nav-item me-2">
                            <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm">Accedi</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-light btn-sm text-primary fw-bold">Registrati</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenuto principale centrato in una colonna -->
    <main class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{ $slot }}
            </div>
        </div>
    </main>

</body>
</html>