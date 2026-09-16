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
            <a class="navbar-brand fw-bold" href="{{ route('posts.index') }}">📚 Esercizio Blog</a>
        </div>
    </nav>

    <!-- Contenuto principale centrate in una colonna -->
    <main class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{ $slot }}
            </div>
        </div>
    </main>

</body>
</html>